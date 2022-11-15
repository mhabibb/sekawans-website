<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Education;
use App\Models\PatientStatus;
use App\Models\Religion;

class PatientController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $patients = Patient::latest()->get();
    return view('admin.patient.index', [
      'title' => 'Data Pasien',
      'patients' => $patients->paginate(10)
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $religions = Religion::all();
    $educations = Education::all();
    $statuses = PatientStatus::all();
    return view('admin.patient.create', compact('religions', 'educations', 'statuses'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StorePatientRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePatientRequest $request)
  {
    dd($request);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Patient  $patient
   * @return \Illuminate\Http\Response
   */
  public function show(Patient $patient)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Patient  $patient
   * @return \Illuminate\Http\Response
   */
  public function edit(Patient $patient)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePatientRequest  $request
   * @param  \App\Models\Patient  $patient
   * @return \Illuminate\Http\Response
   */
  public function update(UpdatePatientRequest $request, Patient $patient)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Patient  $patient
   * @return \Illuminate\Http\Response
   */
  public function destroy(Patient $patient)
  {
    //
  }
}
