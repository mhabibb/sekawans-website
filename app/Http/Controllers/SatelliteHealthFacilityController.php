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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:satellite_health_facilities|max:64',
        ]);

        $satellite = SatelliteHealthFacility::create([
            'name' => $request->name,
        ]);

        return response()->json($satellite, 201);
    }
}
