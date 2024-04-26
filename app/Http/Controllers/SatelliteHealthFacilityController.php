<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SatelliteHealthFacility;

class SatelliteHealthFacilityController extends Controller
{
    // Existing methods...

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // Pakai validasi tolong
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|unique:satellite_health_facilities|max:64',
             'district_id' => 'required|exists:districts,id',
             'url_map' => 'nullable|string|max:1080', 
         ], [
             'name.required' => 'Nama harus diisi.',
             'name.unique' => 'Nama sudah digunakan.',
             'name.max' => 'Nama tidak boleh lebih dari 64 karakter.',
             'district_id.required' => 'Distrik harus dipilih.',
             'district_id.exists' => 'Distrik yang dipilih tidak valid.',
             'url_map.max' => 'URL peta tidak boleh lebih dari 1080 karakter.', 
         ]);
     
         $satellite = SatelliteHealthFacility::create([
             'name' => $request->name,
             'district_id' => $request->district_id,
             'url_map' => $request->url_map,
         ]);
     
         return redirect()->route('admin.fasyankes.index')
             ->with('success', 'Fasilitas berhasil dibuat.');
     }
     
     public function update(Request $request, SatelliteHealthFacility $facility)
     {
         $request->validate([
             'name' => 'required|max:64|unique:satellite_health_facilities,name,' . $facility->id,
             'url_map' => 'nullable|max:1080', 
             'district_id' => 'required|exists:districts,id'
         ], [
             'name.required' => 'Nama harus diisi.',
             'name.unique' => 'Nama sudah digunakan.',
             'name.max' => 'Nama tidak boleh lebih dari 64 karakter.',
             'district_id.required' => 'Distrik harus dipilih.',
             'district_id.exists' => 'Distrik yang dipilih tidak valid.',
             'url_map.max' => 'URL peta tidak boleh lebih dari 1080 karakter.', 
         ]);
     
         $facility->update([
             'name' => $request->name,
             'url_map' => $request->url_map,
             'district_id' => $request->district_id,
         ]);
     
         return redirect()->route('admin.fasyankes.index')
             ->with('success', 'Fasilitas berhasil diperbarui.');
     }     
     
}
