<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $logs = Activity::all();
        // dd($logs->first());
        return view('admin.activitylog.index', compact('logs'));
        // return dd($log);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $log)
    {
        return dd($log->changes());
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
