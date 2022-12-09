<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->uuid = null;
        $logs = Activity::all()->reverse()->filter(function ($value) {
            if (!($value->log_name == 'article' && ($value->event == 'restored' || $value->event == 'deleted'))) {
                if ($value->batch_uuid) {
                    if ($this->uuid !== $value->batch_uuid) {
                        $this->uuid = $value->batch_uuid;
                        return $value;
                    }
                } else return $value;
            }
        });
        return view('admin.activitylog.index', compact('logs'));
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Activity  $activity
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Activity $log)
    // {
    //     if ($log->batch_uuid) {
    //         $logs = $log->forBatch($log->batch_uuid)->get();
    //         foreach ($logs as $log) {
    //             if ($log->log_name === "patient") $patient = $log;
    //             if ($log->log_name === "patient detail") $patientDetail = $log;
    //             if ($log->log_name === "emergency contact") $emergencyContact = $log;
    //         }
    //         // dd($patient->changes(), $patientDetail->changes(), $emergencyContact->changes());
    //         // if (request()->ajax()) {
    //         //     return true;
    //         // }
    //         return json_encode([
    //             "patient" => $patient->changes(),
    //             "patientDetail" => $patientDetail->changes(),
    //             "emergencyContact" => $emergencyContact->changes()
    //         ]);
    //     } else {
    //         $log_name = $log->log_name;
    //         $subject = $log->subject;
    //         $model = $log->subject_type;
    //         $user = $log->causer;
    //         $properties = $log->changes();
    //         dd($subject, $model, $user, $properties);
    //         return view('admin.activitylog.show', compact('log_name', 'subject', 'model', 'user', 'properties'));
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function restore(Activity $activity)
    {
        if ($activity->batch_uuid) {
            $activities = $activity->forBatch($activity->batch_uuid)->get()->reverse();
            $status = collect();
            foreach ($activities as $activity) {
                $status->add($this->restoring($activity));
            }
            $this->connect($activities, $status);
        } else {
            $this->restoring($activity);
        }
    }

    private function restoring($activity)
    {
        $model = $activity->subject_type;
        $properties = $activity->changes();
        $model::unguard();
        activity()->disableLogging();
        $status = match ($activity->event) {
            'deleted', 'updated' => $model::updateOrCreate(['id' => $properties['old']['id']], $properties['old']),
            'created' => $model->delete()
        };
        $activity->delete();
        activity()->enableLogging();
        $model::reguard();
        return $status;
    }

    private function connect($activities, $result){
        $i = 0;
        activity()->disableLogging();
        foreach ($activities as $activity) {
            $result[$i]->update($activity->changes()['old']);
            $i++;
        }
        activity()->enableLogging();
    }
}
