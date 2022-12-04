<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('log');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->uuid = null;
        $logs = Activity::all()->filter(function ($value) {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $log)
    {
        if ($log->batch_uuid) {
            $logs = $log->forBatch($log->batch_uuid)->get();
            foreach ($logs as $log) {
                if ($log->log_name === "patient") $patient = $log;
                if ($log->log_name === "patient detail") $patientDetail = $log;
                if ($log->log_name === "emergency contact") $emergencyContact = $log;
            }
            dd($patient->changes(), $patientDetail->changes(), $emergencyContact->changes());
        } else {
            $subject = $log->subject;
            $model = $log->subject_type;
            $user = $log->causer;
            $properties = $log->changes();
            return dd($subject, $model, $user, $properties);
        }
    }

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
            foreach ($activities as $activity) {
                $this->restoring($activity);
            }
        } else {
            $this->restoring($activity);
        }
    }

    private function restoring($activity)
    {
        $subject = $activity->subject;
        $model = $activity->subject_type;
        $user = $activity->causer;
        $properties = $activity->changes();
        $model::unguard();
        $status = $model::updateOrCreate($properties['old']);
        // $status = match ($activity->event) {
        //     'deleted' => $model::updateOrCreate($properties['old'])
        // };
        $activity->delete();
        $model::reguard();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
