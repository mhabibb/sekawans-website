<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Http\Requests\StoreWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;
use App\Models\SateliteHealthFacility;

class WorkerController extends Controller
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
    $facilities = SateliteHealthFacility::get();
    $workers = Worker::get();
    return view('admin.fasyankes.index', compact('facilities', 'workers'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() 
  {
    return view('admin.worker.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreWorkerRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreWorkerRequest $request)
  {
    $request = $request->validated();
    Worker::create($request);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Worker  $worker
   * @return \Illuminate\Http\Response
   */
  public function show(Worker $worker)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Worker  $worker
   * @return \Illuminate\Http\Response
   */
  public function edit(Worker $worker)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateWorkerRequest  $request
   * @param  \App\Models\Worker  $worker
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateWorkerRequest $request, Worker $worker)
  {
    $request = $request->validated();
    $worker->update($request);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Worker  $worker
   * @return \Illuminate\Http\Response
   */
  public function destroy(Worker $worker)
  {
    Worker::destroy($worker);
  }
}
