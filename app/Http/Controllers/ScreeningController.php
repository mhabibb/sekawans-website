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
            $validated = $request->validate([
                'agreement' => 'required',
                'full_name' => 'required|string',
                'contact' => 'required|string',
                'gender' => 'required|in:male,female',
                'age' => 'required|numeric',
                'district' => 'required|string',
                'screening_date' => 'required|date',
                'home_contact' => 'required|in:1,0',
                'cough' => 'required|in:1,0',
                'breath' => 'required|in:1,0',
                'sweat' => 'required|in:1,0',
                'fever' => 'required|in:1,0',
                'weight_loss' => 'required|in:1,0',
                'pregnant' => 'required|in:1,0',
                'elderly' => 'required|in:1,0',
                'diabetes' => 'required|in:1,0',
                'smoking' => 'required|in:1,0',
                'close_contact' => 'required|in:1,0',
                'ever_treatment' => 'required|in:1,0',
                'contact1_name' => 'required|string',
                'contact1_number' => 'required|string',
                'contact2_name' => 'required|string',
                'contact2_number' => 'required|string',
                'contact3_name' => 'required|string',
                'contact3_number' => 'required|string'
            ]);

            // Hitung hasil screening
            $cough = ['cough'];
            $gejala = ['breath','sweat','fever','weight_loss'];
            $resiko = ['pregnant','elderly','diabetes','smoking','close_contact','ever_treatment'];
            if ($validated['cough'] == '1') {
                foreach ($gejala as  $item) {
                    if ($validated[$item] == '1') {
                        foreach ($resiko as $item) {
                            if ($validated[$item] == '1') {
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
            $district = District::where('name', $screening['district'])->first();
            $faskes = $district->satelliteHealthFacility;

            return view('web.screening-result', compact(
                'screening',
                'district',
                'faskes',
                'screening_date',
                'full_name',
                'age',
                'gender',
                'home_contact',
                'cough',
                'breath',
                'sweat',
                'fever',
                'weight_loss',
                'pregnant',
                'elderly',
                'diabetes',
                'smoking',
                'close_contact',
                'ever_treatment'
            ));
        }
        return to_route('screening');
    }

    public function downloadSuratRekomendasi()
    {
        $screening = session()->get('screening');

        if ($screening) {
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);

            $pdf = new Dompdf($options);

            $html = view('web.suratrekomendasi', ['screening' => $screening])->render();

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
