<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\StaticElement;
use App\Models\Article;
use App\Models\Regency;
use App\Models\District;
use App\Models\PatientDetail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $about = StaticElement::find(1);
        preg_match('/^([^.!?]*[.!?]+){0,2}/', strip_tags($about->contents), $about);
        $regencies = Regency::whereHas('patients')->withCount('patients')->get();
        $articles = Article::latest()->category(2)->get()->take(3);
        return view('web.index', [
            'about' => $about,
            'articles' => $articles,
            'regencies' => $regencies
        ]);
    }

    public function structur()
    {
        return view('tentang.struktur');
    }

    public function about()
    {
        return view('web.tentang');
    }

    public function info()
    {
        $infos = Article::all()->where('category_id', 1);
        return view('web.infotbc', ['infos' => $infos]);
    }

    public function showInfo(Article $article)
    {
        return view('web.single_infotbc', ['info' => $article]);
    }

    public function case()
    {
        $regencies = Regency::whereHas('patients')->withCount('patients')->get();
        // dd($regencies);
        return view('web.kasustbc', ['regencies' => $regencies]);
    }

    public function showCase(Regency $regency)
    {
        $compek = Regency::count('status')->find($regency->id);
        return view('web.showKasustbc', ['regency' => $compek]);
    }

    public function article()
    {
        $articles = Article::latest()->category(2)->paginate(12);
        return view('web.artikel', ['articles' => $articles]);
    }

    public function showArticle(Article $article)
    {
        return view('web.single_artikel', [
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
        return view('web.single_kegiatan', ['action' => $article]);
    }
}
