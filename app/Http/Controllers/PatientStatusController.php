<?php

namespace App\Http\Controllers;

use App\Models\PatientStatus;
use App\Http\Requests\StorePatientStatusRequest;
use App\Http\Requests\UpdatePatientStatusRequest;

class PatientStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientStatus  $patientStatus
     * @return \Illuminate\Http\Response
     */
    public function show(PatientStatus $patientStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientStatus  $patientStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientStatus $patientStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientStatusRequest  $request
     * @param  \App\Models\PatientStatus  $patientStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientStatusRequest $request, PatientStatus $patientStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientStatus  $patientStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientStatus $patientStatus)
    {
        //
    }
}