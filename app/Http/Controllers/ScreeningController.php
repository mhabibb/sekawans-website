<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\SatelliteHealthFacility;
use Illuminate\Http\Request;
use App\Models\Screening;
use App\Models\Regency;
use Exception;
use Dompdf\Dompdf;
use Dompdf\Options;

class ScreeningController extends Controller
{

    public function store(Request $request)
    {
        try {
            // Validasi input dari request
            $validated = $request->validate([
                'agreement' => 'required|boolean',

                // Identitas Diri
                'full_name' => 'required|string',
                'nik' => 'required|string',
                'contact' => 'required|string',
                'gender' => 'required|string',
                'age' => 'required|numeric|min:0',
                'address' => 'required|string',
                'domicile_address' => 'required|string',
                'district' => 'required|string',
                'screening_date' => 'required|date',

                // Skoring Batuk
                'cough_two_weeks' => 'required|boolean',

                // Skoring Gejala Lain
                'shortness_breath' => 'required|boolean',
                'night_sweats' => 'required|boolean',
                'fever_one_month' => 'required|boolean',

                // Skoring Faktor Risiko
                'pregnant' => 'required|boolean',
                'elderly' => 'required|boolean',
                'diabetes' => 'required|boolean',
                'smoking' => 'required|boolean',
                'incomplete_tb_treatment' => 'required|boolean',

                // Kontak
                'contact1_name' => 'required|string',
                'contact1_number' => 'required|string',
                'contact2_name' => 'required|string',
                'contact2_number' => 'required|string',
                'contact3_name' => 'required|string',
                'contact3_number' => 'required|string'
            ]);

            $has_cough = $validated['cough_two_weeks'];

            $gejala = ['shortness_breath', 'night_sweats', 'fever_one_month'];
            $has_gejala = collect($gejala)->filter(function ($item) use ($validated) {
                return $validated[$item];
            })->count() >= 1;

            $resiko = ['pregnant', 'elderly', 'diabetes', 'smoking', 'incomplete_tb_treatment'];
            $has_resiko = collect($resiko)->filter(function ($item) use ($validated) {
                return $validated[$item];
            })->count() >= 1;

            if ($has_cough && $has_gejala && $has_resiko) {
                $validated['is_positive'] = true;
            } else {
                $validated['is_positive'] = false;
            }

            $screening = Screening::create($validated);

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
            $district = District::where('name', $screening['district'])->first();
            $faskes = $district->satelliteHealthFacility->pluck('url_map', 'name');

            $full_name = $screening['full_name'];
            $nik = $screening['nik'];
            $gender = $screening['gender'];
            $age = $screening['age'];
            $address = $screening['address'];
            $domicile_address = $screening['domicile_address'];
            $screening_date = $screening['screening_date'];
            $cough_two_weeks = $screening['cough_two_weeks'];
            $shortness_breath = $screening['shortness_breath'];
            $night_sweats = $screening['night_sweats'];
            $fever_one_month = $screening['fever_one_month'];
            $pregnant = $screening['pregnant'];
            $elderly = $screening['elderly'];
            $diabetes = $screening['diabetes'];
            $smoking = $screening['smoking'];
            $incomplete_tb_treatment = $screening['incomplete_tb_treatment'];

            return view('web.screening-result', compact(
                'screening',
                'district',
                'faskes',
                'full_name',
                'nik',
                'gender',
                'age',
                'address',
                'domicile_address',
                'screening_date',
                'cough_two_weeks',
                'shortness_breath',
                'night_sweats',
                'fever_one_month',
                'pregnant',
                'elderly',
                'diabetes',
                'smoking',
                'incomplete_tb_treatment'
            ));
        }
        return redirect()->route('screening');
    }

    public function downloadSuratRekomendasi(Request $request)
    {
        $screening = session()->get('screening');
        $selectedFaskes = $request->input('selectedFaskes');

        if ($screening) {
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);

            $pdf = new Dompdf($options);

            $html = view('web.suratrekomendasi', ['screening' => $screening, 'selectedFaskes' => $selectedFaskes])->render();

            $pdf->loadHtml($html);
            $pdf->setPaper('A4', 'portrait');
            $pdf->render();

            return $pdf->stream('Surat Rekomendasi TBC.pdf');
        } else {
            return redirect()->route('screening')->with('error', 'Data screening tidak tersedia.');
        }
    }

    public function index()
    {
        $screenings = Screening::all();
        $title = "Daftar Skrining";
        return view('admin.screening.index', compact('screenings', 'title'));
    }

    public function destroy($id)
    {
        try {
            $screening = Screening::findOrFail($id);
            $screening->delete();

            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Gagal menghapus data'], 500);
        }
    }

    public function show($id)
    {
        $screening = Screening::findOrFail($id);

        return view('admin.screening.show', compact('screening'));
    }
}
