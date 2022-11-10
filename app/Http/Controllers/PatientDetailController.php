<?php

namespace App\Http\Controllers;

use App\Models\PatientDetail;
use App\Http\Requests\StorePatientDetailRequest;
use App\Http\Requests\UpdatePatientDetailRequest;

class PatientDetailController extends Controller
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
     * @param  \App\Http\Requests\StorePatientDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientDetail  $patientDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PatientDetail $patientDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientDetail  $patientDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientDetail $patientDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientDetailRequest  $request
     * @param  \App\Models\PatientDetail  $patientDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientDetailRequest $request, PatientDetail $patientDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientDetail  $patientDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientDetail $patientDetail)
    {
        //
    }
}
