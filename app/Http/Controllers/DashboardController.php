<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\PatientStatus;
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

        $status = PatientStatus::select('status')->get();
        $status = $status->toArray();
        $stat = [];
        foreach ($status as $sta) {
            array_push($stat, $sta['status']);
        }

        $compek = ['Sembuh', 'Berobat', 'Mangkir', 'LTFU', 'Meninggal'];
        // dd($compek);

        return view('admin.dashboard', [
            'info' => $info,
            'artikel' => $article,
            'kegiatan' => $action,
            'ps' => $workers,
            'fesyankes' => $facilities,
            'status' => json_encode($stat),
        ]);
    }
}
