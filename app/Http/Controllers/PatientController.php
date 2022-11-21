<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Education;
use App\Models\PatientDetail;
use App\Models\PatientStatus;
use App\Models\Regency;
use App\Models\Religion;
use App\Models\SateliteHealthFacility;

class PatientController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // $patients = Patient::withOnly(['patientDetail'], function($query){
    //   $query->withOnly('patientStatus')->get();
    // })->get();
    $patients = PatientDetail::all();
    // dd($patients->first());
    return view('admin.patient.index', [
      'title' => 'Data Pasien',
      'patients' => $patients
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $facilities = SateliteHealthFacility::all();
    $religions = Religion::all();
    $educations = Education::all();
    $statuses = PatientStatus::all();
    $regencies = Regency::all();
    return view('admin.patient.create', compact('facilities', 'religions', 'regencies', 'educations', 'statuses'));
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
    return view('admin.patient.show', compact('patient'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Patient  $patient
   * @return \Illuminate\Http\Response
   */
  public function edit(Patient $patient)
  {
    $facilities = SateliteHealthFacility::all();
    $religions = Religion::all();
    $educations = Education::all();
    $statuses = PatientStatus::all();
    $regencies = Regency::all();
    $detail = $patient->patientDetail;
    return view('admin.patient.edit', compact('patient', 'detail', 'facilities', 'religions', 'regencies', 'educations', 'statuses'));
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
    dd($request->request);
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
