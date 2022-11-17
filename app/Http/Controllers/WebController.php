<?php

namespace App\Http\Controllers;

use App\Models\StaticElement;
use App\Models\Article;
use App\Models\Regency;
use App\Models\PatientStatus;

class WebController extends Controller
{
    public function index()
    {
        $about = StaticElement::find(1);
        preg_match('/^([^.!?]*[.!?]+){0,2}/', strip_tags($about->contents), $about);
        $regencies = Regency::whereHas('patients')->withCount('patients')->get();
        $articles = Article::latest()->category(2)->take(3)->get();
        return view('web.index', [
            'about' => $about,
            'articles' => $articles,
            'regencies' => $regencies,
        ]);
    }

    public function about()
    {
        $profile = StaticElement::find(1);
        $visimisi = StaticElement::find(2);
        $structure = StaticElement::find(3);
        return view('web.tentang', [
            'profile' => $profile->contents,
            'visimisi' => $visimisi->contents,
            'structure' => $structure->contents
        ]);
    }

    public function structur()
    {
        return view('tentang.struktur');
    }

    public function info()
    {
        $infos = Article::all()->where('category_id', 1);
        return view('web.infotbc', ['infos' => $infos]);
    }

    public function showInfo(Article $article)
    {
        return view('web.showInfotbc', ['info' => $article]);
    }

    public function case()
    {
        // jumlah patient tiap status di tiap regency
        $regencies = Regency::count('status')->get();
        // foreach ($regencies as $regency) {
        //     foreach ($regency->districts as $district) {
        //         $keys = collect($district->first())->keys();
        //         dd($district, $keys);
        //         $sum_array = [];
        //         foreach ($keys as $key) {
        //             $sum_array[$key] = $regencies->sum($key);
        //         }
        //     }
        // }
        // dd($regencies);
        $status = PatientStatus::all();
        return view('web.kasustbc', [
            'regencies' => $regencies,
            'status' => $status
        ]);
    }

    public function showCase(Regency $regency)
    {
        $compek = Regency::count('detailStatus')->find($regency->id);
        return view('web.showKasustbc', ['regency' => $compek]);
    }

    public function article()
    {
        $articles = Article::latest()->category(2)->get()->paginate(12);
        return view('web.artikel', ['articles' => $articles]);
    }

    public function showArticle(Article $article)
    {
        return view('web.showArtikel', [
            'article' => $article
        ]);
    }

    public function action()
    {
        $actions = Article::latest()->category(3)->paginate(12);
        return view('web.kegiatan', ['actions' => $actions]);
    }

    public function showAction(Article $article)
    {
        return view('web.showKegiatan', ['action' => $article]);
    }
}
