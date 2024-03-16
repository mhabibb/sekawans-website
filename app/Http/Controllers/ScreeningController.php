<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\SatelliteHealthFacility;
use Illuminate\Http\Request;
use App\Models\Screening;
use Exception;

class ScreeningController extends Controller
{

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'agreement' => 'required',
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
            // Hitung hasil screening
            $batuk = ['batuk'];
            $gejala = ['sesak_nafas','keringat_malam_hari','demam_meriang'];
            $resiko = ['ibu_hamil','lansia','diabetes_melitus','merokok'];
            if ($validated['batuk'] == 'Ya') {
                foreach ($gejala as  $item) {
                    if ($validated[$item] == 'Ya') {
                        foreach ($resiko as $item) {
                            if ($validated[$item] == 'Ya') {
                                $validated['is_positive'] = true;
                                $screening = Screening::create($validated);
                                // Menyimpan data screening ke session
                                session()->put('screening', $validated);
                    
                                return redirect()->route('screening.result')->with('success', 'Formulir berhasil disimpan!');
                            }
                        }
                    }
                }
            }
            $validated['is_positive'] = false;
            // Simpan data ke dalam database
            $screening = Screening::create($validated);
            // Menyimpan data screening ke session
            session()->put('screening', $validated);

            return redirect()->route('screening.result')->with('success', 'Formulir berhasil disimpan!');
        } catch (Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function result()
    {
        $screening = session()->get('screening');
        if ($screening) {
            $district = District::where('name',$screening['district'])->first();
            $faskes = $district->satelliteHealthFacility;
            return view('web.screening-result',[
                'screening' => $screening,
                'district' => $district,
                'faskes' => $faskes,
                'screening_date' => $screening['screening_date'],
                'full_name' => $screening['full_name'],
                'age' => $screening['age'],
                'gender' => $screening['gender'],
                'contact_with_tb' => $screening['contact_with_tb'],
                'batuk' => $screening['batuk'],
                'sesak_nafas' => $screening['sesak_nafas'],
                'keringat_malam_hari' => $screening['keringat_malam_hari'],
                'demam_meriang' => $screening['demam_meriang'],
                'ibu_hamil' => $screening['ibu_hamil'],
                'lansia' => $screening['lansia'],
                'diabetes_melitus' => $screening['diabetes_melitus'],
                'merokok' => $screening['merokok'],
            ]);        
        }
        return to_route('screening');
    }
}