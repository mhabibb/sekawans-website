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
                'agreement' => 'required|boolean',
                'full_name' => 'required|string',
                'contact' => 'required|string',
                'gender' => 'required|string',
                'age' => 'required|numeric',
                'district' => 'required|string',
                'screening_date' => 'required|date',
                'home_contact' => 'required|boolean',
                'cough' => 'required|boolean',
                'breath' => 'required|boolean',
                'sweat' => 'required|boolean',
                'fever' => 'required|boolean',
                'weight_loss' => 'required|boolean',
                'pregnant' => 'required|boolean',
                'elderly' => 'required|boolean',
                'diabetes' => 'required|boolean',
                'smoking' => 'required|boolean',
                'close_contact' => 'required|boolean',
                'ever_treatment' => 'required|boolean',
                'contact1_name' => 'nullable|string',
                'contact1_number' => 'nullable|string',
                'contact2_name' => 'nullable|string',
                'contact2_number' => 'nullable|string',
                'contact3_name' => 'nullable|string',
                'contact3_number' => 'nullable|string'
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

            // Ambil nilai variabel dari array $screening
            $screening_date = $screening['screening_date'];
            $full_name = $screening['full_name'];
            $age = $screening['age'];
            $gender = $screening['gender'];
            $home_contact = $screening['home_contact'];
            $cough = $screening['cough'];
            $breath = $screening['breath'];
            $sweat = $screening['sweat'];
            $fever = $screening['fever'];
            $weight_loss = $screening['weight_loss'];
            $pregnant = $screening['pregnant'];
            $elderly = $screening['elderly'];
            $diabetes = $screening['diabetes'];
            $smoking = $screening['smoking'];
            $close_contact = $screening['close_contact'];
            $ever_treatment = $screening['ever_treatment'];

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
        return redirect()->route('screening');
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
