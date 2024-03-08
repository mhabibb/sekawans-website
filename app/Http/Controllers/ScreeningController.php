<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Screening;
use Exception;

class ScreeningController extends Controller
{

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'agreement' => 'required|in:Ya',
                'full_name' => 'required|string',
                'contact' => 'required|string',
                'gender' => 'required|in:male,female',
                'age' => 'required|numeric',
                'district' => 'required|string',
                'screening_date' => 'required|date',
                'contact_with_tb' => 'required|in:Ya,Tidak',
                'batuk' => 'required|in:Ya,Tidak',
                'sesak_nafas' => 'required|in:Ya,Tidak',
                'keringat_malam_hari' => 'required|in:Ya,Tidak',
                'demam_meriang' => 'required|in:Ya,Tidak',
                'ibu_hamil' => 'required|in:Ya,Tidak',
                'lansia' => 'required|in:Ya,Tidak',
                'diabetes_melitus' => 'required|in:Ya,Tidak',
                'merokok' => 'required|in:Ya,Tidak',
                'contact1_name' => 'required|string',
                'contact1_number' => 'required|string',
                'contact2_name' => 'required|string',
                'contact2_number' => 'required|string',
                'contact3_name' => 'required|string',
                'contact3_number' => 'required|string'
            ]);

            // Simpan data ke dalam database
            $screening = new Screening($data);
            $screening->save();

            return redirect()->route('screenings.create')->with('success', 'Formulir berhasil disimpan!');
        } catch (Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
