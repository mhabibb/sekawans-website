<?php

namespace App\Http\Controllers;

use App\Models\SatelliteHealthFacility;
use App\Models\Worker;
use App\Models\District;
use App\Http\Requests\UpdateSatelliteHealthFacilityRequest;
use App\Http\Requests\UpdateSatelliteWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;
use App\Http\Requests\StoreSatelliteHealthFacilityRequest;
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
        $satellites = SatelliteHealthFacility::with('district')->orderBy('name', 'asc')->get();
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateSatelliteWorkerRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function update($table, UpdateSatelliteWorkerRequest $request, $data)
    // {
    //     return match ($table) {
    //         'satellite' => $this->updateSatellite($request->convertRequest(UpdateSatelliteHealthFacilityRequest::class), SatelliteHealthFacility::find($data)),
    //         'worker'    => $this->updateWorker($request->convertRequest(UpdateWorkerRequest::class), Worker::find($data)),
    //     };
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSatelliteHealthFacilityRequest  $request
     * @param  \App\Models\SatelliteHealthFacility  $satelliteHealthFacility
     * @return \Illuminate\Http\Response
     */
    private function updateSatellite(UpdateSatelliteHealthFacilityRequest $request, SatelliteHealthFacility $satelliteHealthFacility)
    {
        $request = $request->validated();
        $satelliteHealthFacility->update($request);
        return $satelliteHealthFacility->name;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkerRequest  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    private function updateWorker(UpdateWorkerRequest $request, Worker $worker)
    {
        $request = $request->validated();
        $worker->update($request);
        return $worker->name;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SatelliteHealthFacility  $satelliteHealthFacility
     * @return \Illuminate\Http\Response
     */
    public function workerDestroy($table, $id)
    {
        $status = match ($table) {
            'workers'   => Worker::find($id)->delete()
        };
        return $status;
    }

    public function create()
    {
        $districts = District::all();
        return view('admin.fasyankes.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:64',
            'district' => 'required|exists:districts,id', // Ubah menjadi memeriksa ID kecamatan
            'url_map' => 'nullable|string|max:255',
        ]);
    
        SatelliteHealthFacility::create([
            'name' => $request->name,
            'district_id' => $request->district_id,
            'url_map' => $request->url_map,
        ]);        
    
        return redirect()->route('admin.fasyankes.index')
            ->with('success', 'Faskes berhasil ditambahkan.');
    }
    


    public function edit(SatelliteHealthFacility $facility)
    {
        $districts = District::all();
        return view('admin.fasyankes.edit', compact('facility', 'districts'));
    }

    public function update(Request $request, SatelliteHealthFacility $facility)
    {
        $request->validate([
            'name' => 'required|max:64|unique:satellite_health_facilities,name,' . $facility->id,
            'url_map' => 'nullable|max:255',
            'district_id' => 'required|exists:districts,id'
        ]);

        $facility->update($request->all());

        return redirect()->route('admin.fasyankes.index')
            ->with('success', 'Facility updated successfully.');
    }

    public function show(SatelliteHealthFacility $facility)
    {
        return view('admin.fasyankes.show', compact('facility'));
    }


    public function satellitedestroy(SatelliteHealthFacility $facility)
    {
        $facility = SatelliteHealthFacility::findOrFail($facility->id);

        $facility->delete();

        return redirect()->route('admin.fasyankes.index')
            ->with('success', 'Facility deleted successfully.');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

}