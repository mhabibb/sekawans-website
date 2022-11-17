<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\PatientStatus;
use App\Models\Regency;
use App\Models\SateliteHealthFacility;
use App\Models\Worker;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $info = Article::latest()->category(1)->get()->count();
        $article = Article::latest()->category(2)->get()->count();
        $action = Article::latest()->category(3)->get()->count();
        $workers = Worker::all()->count();
        $facilities = SateliteHealthFacility::all()->count();

        $regency = Regency::count('status')->get();

        return view('admin.dashboard', [
            'info' => $info,
            'artikel' => $article,
            'kegiatan' => $action,
            'ps' => $workers,
            'fesyankes' => $facilities,
            'besuki' => $regency,
        ]);
    }
}
