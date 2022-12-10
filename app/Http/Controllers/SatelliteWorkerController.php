<?php

namespace App\Http\Controllers;

use App\Models\SatelliteHealthFacility;
use App\Http\Requests\StoreSatelliteHealthFacilityRequest;
use App\Http\Requests\UpdateSatelliteHealthFacilityRequest;
use App\Models\Worker;
use Illuminate\Http\Request;

class SatelliteWorkerController extends Controller
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
        $fasyankes = collect(["RS PARU JEMBER", "RSD DR. SOEBANDI JEMBER"]);
        $satelites = SatelliteHealthFacility::orderBy('name', 'asc')->get();
        $workers = Worker::orderBy('name', 'asc')->get();
        return view('admin.fasyankes.index', compact('fasyankes', 'satelites', 'workers'));
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

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \App\Http\Requests\StoreSatelliteHealthFacilityRequest  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(StoreSatelliteHealthFacilityRequest $request)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SatelliteHealthFacility  $satelliteHealthFacility
     * @return \Illuminate\Http\Response
     */
    public function edit(SatelliteHealthFacility $satelliteHealthFacility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSatelliteHealthFacilityRequest  $request
     * @param  \App\Models\SatelliteHealthFacility  $satelliteHealthFacility
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSatelliteHealthFacilityRequest $request, SatelliteHealthFacility $satelliteHealthFacility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SatelliteHealthFacility  $satelliteHealthFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy($table, $id)
    {
        match ($table) {
            'satelite'  => SatelliteHealthFacility::find($id)->delete(),
            'workers'   => Worker::find($id)->delete()
        };
        return to_route('admin.fasyankes.index')->withSuccess("Data Terhapus!");
    }
}
