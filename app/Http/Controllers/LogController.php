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
            if ($value->batch_uuid) {
                if ($this->uuid !== $value->batch_uuid) {
                    $this->uuid = $value->batch_uuid;
                    return $value;
                }
            } else return $value;
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
        $subject = $log->subject;
        $model = $log->subject_type;
        $user = $log->causer;
        $properties = $log->changes();
        return dd($subject, $model, $user, $properties);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function restore(Activity $activity)
    {
        $subject = $activity->subject;
        $model = $activity->subject_type;
        $user = $activity->causer;
        $properties = $activity->changes();
        $model::unguard();
        $status = match ($activity->event) {
            'deleted' => $model::updateOrCreate($properties['old'])
        };
        $activity->delete();
        $model::reguard();
        dd($subject, $model, $user, $properties, $status);
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
