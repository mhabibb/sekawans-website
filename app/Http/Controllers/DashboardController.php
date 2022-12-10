<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Patient;
use App\Models\PatientDetail;
use App\Models\Regency;
use App\Models\SateliteHealthFacility;
use App\Models\Worker;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
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

    public function index()
    {
        // Hash::check('password', auth()->user()->password) ? alert('Ndang ganti password') : '';
        $info = Article::latest()->category(1)->get()->count();
        $article = Article::latest()->category(2)->get()->count();
        $action = Article::latest()->category(3)->get()->count();
        $patient = PatientDetail::inTreatment()->count();
        $facilities = SateliteHealthFacility::all()->count();
        $first = Hash::check('password', auth()->user()->password) ?? false;
        // dd($first);

        $regency = Regency::count('status')->get();

        return view('admin.dashboard', [
            'info' => $info,
            'artikel' => $article,
            'kegiatan' => $action,
            'pasien' => $patient,
            'fesyankes' => $facilities,
            'kabupaten' => $regency,
            'first' => $first,
        ]);
    }
}
