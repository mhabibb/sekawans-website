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
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $this->authorize('superAdmin');
    $logs = Activity::where('event', 'updated')->get();
    return view('admin.activitylog.index', compact('logs'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Activity  $activity
   * @return \Illuminate\Http\Response
   */
  public function show(Activity $activity)
  {
    return $activity;
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
