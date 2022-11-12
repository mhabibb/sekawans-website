<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $info = Article::latest()->where('category_id', '1')->get();
        $artikel = Article::latest()->where('category_id', '2')->get();
        $kegiatan = Article::latest()->where('category_id', '3')->get();
        return view('admin.dashboard', [
            'info' => $info,
            'artikel' => $artikel,
            'kegiatan' => $kegiatan
        ]);
    }
}
