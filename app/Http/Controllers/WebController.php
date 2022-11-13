<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\StaticElement;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $about = StaticElement::find(1);
        preg_match('/^([^.!?]*[.!?]+){0,2}/', strip_tags($about->contents), $about);
        $patient = Patient::latest()->get()->take(10);
        return view('index');
    }

    public function about()
    {
        return view('tentang.tentang');
    }

    public function structur()
    {
        return view('tentang.struktur');
    }

    public function info()
    {
        return view('info_tbc.info_tbc');
    }

    public function showInfo($id)
    {
        return view('info_tbc.single_infotbc');
    }

    public function case()
    {
        return view('kasus_tbc.kasustbc');
    }

    public function showCase()
    {
        return view('kasus_tbc.kasustbc');
    }

    public function action()
    {
        return view('kegiatan.kegiatan');
    }

    public function showAction()
    {
        return view('kegiatan.single_kegiatan');
    }

    public function article()
    {
        return view('artikel.artikel');
    }

    public function showArticle()
    {
        return view('artikel.single_artikel');
    }
}
