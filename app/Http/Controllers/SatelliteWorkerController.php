<?php

namespace App\Http\Controllers;

use App\Models\SatelliteHealthFacility;
use App\Models\Worker;
use App\Http\Requests\UpdateSatelliteHealthFacilityRequest;
use App\Http\Requests\UpdateSatelliteWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;
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
        $satellites = SatelliteHealthFacility::orderBy('name', 'asc')->get();
        $workers = Worker::orderBy('name', 'asc')->get();
        return view('admin.fasyankes.index', compact('fasyankes', 'satellites', 'workers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaticElement  $staticElement
     * @return \Illuminate\Http\Response
     */
    public function check($table, $name)
    {
        return match ($table) {
            'satellite' => SatelliteHealthFacility::where('name', $name)->get()->isEmpty() ? json_encode($name) : false,
            'worker'    => Worker::where('name', $name)->get()->isEmpty() ? json_encode($name) : false,
        };
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

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\UpdateSatelliteWorkerRequest  $request
    //  * @param  \App\Models\SatelliteHealthFacility  $satelliteHealthFacility
    //  * @return \Illuminate\Http\Response
    //  */
    public function update($table, UpdateSatelliteWorkerRequest $request, $data)
    {
        return match ($table) {
            'satellite' => $this->updateSatellite($request->convertRequest(UpdateSatelliteHealthFacilityRequest::class), SatelliteHealthFacility::find($data)),
            'worker'    => $this->updateWorker($request->convertRequest(UpdateWorkerRequest::class), Worker::find($data)),
        };
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \App\Http\Requests\UpdateSatelliteHealthFacilityRequest  $request
    //  * @param  \App\Models\SatelliteHealthFacility  $satelliteHealthFacility
    //  * @return \Illuminate\Http\Response
    //  */
    private function updateSatellite(UpdateSatelliteHealthFacilityRequest $request, SatelliteHealthFacility $satelliteHealthFacility)
    {
        $request = $request->validated();
        $satelliteHealthFacility->update($request);
        return $satelliteHealthFacility->wasChanged();
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \App\Http\Requests\UpdateWorkerRequest  $request
    //  * @param  \App\Models\Worker  $worker
    //  * @return \Illuminate\Http\Response
    //  */
    private function updateWorker(UpdateWorkerRequest $request, Worker $worker)
    {
        $request = $request->validated();
        $worker->update($request);
        return $worker->wasChanged();
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
            'satellite'  => SatelliteHealthFacility::find($id)->delete(),
            'workers'   => Worker::find($id)->delete()
        };
        return to_route('admin.fasyankes.index')->withSuccess("Data Terhapus!");
    }
}
