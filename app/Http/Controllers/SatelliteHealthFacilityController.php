<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\SatelliteHealthFacility;
use Illuminate\Http\Request;

class SatelliteHealthFacilityController extends Controller
{
    public function index()
    {
        $facilities = SatelliteHealthFacility::with('district')->get();
        $districts = District::all();
        return view('admin.faskes.index', compact('facilities'));
    }


    public function create()
    {
        $districts = District::all();
        return view('admin.faskes.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:64',
            'district' => 'required|string|exists:districts,id',
            'url_map' => 'nullable|string|max:255',
        ]);
    
        SatelliteHealthFacility::create([
            'name' => $request->name,
            'district' => $request->district,
            'url_map' => $request->url_map,
        ]);
    
        return redirect()->route('admin.facilities.index')
            ->with('success', 'Faskes berhasil ditambahkan.');
    }
    

    public function edit(SatelliteHealthFacility $facility)
    {
        $districts = District::all();
        return view('admin.faskes.edit', compact('facility', 'districts'));
    }

    public function update(Request $request, SatelliteHealthFacility $facility)
    {
        $request->validate([
            'name' => 'required|max:64|unique:satellite_health_facilities,name,' . $facility->id,
            'url_map' => 'nullable|max:255',
            'district_id' => 'required|exists:districts,id'
        ]);

        $facility->update($request->all());

        return redirect()->route('admin.facilitites.index')
            ->with('success', 'Facility updated successfully.');
    }

    public function destroy(SatelliteHealthFacility $facility)
    {
        $facility = SatelliteHealthFacility::findOrFail($facility->id);
        
        $facility->delete();
    
        return redirect()->route('admin.facilities.index')
            ->with('success', 'Facility deleted successfully.');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

}