<?php

namespace App\Http\Controllers;

use App\Models\StaticElement;
use App\Models\Article;
use App\Models\Regency;
use Illuminate\Http\Request;

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
        $abouts = StaticElement::get();
        $profilFig = array(
            'image' => "img/sekawans.jpg",
            'caption' => "Sekawan'S TB bersama mahasiswa magang MSIB dan pasien sembuh pada kegiatan FGD 3 November 2022",
        );
        return view('web.tentang', [
            'profile' => $abouts->find(1),
            'figure' => $profilFig,
            'visimisi' => $abouts->find(2),
            'structure' => $abouts->find(3)
        ]);
    }

    public function info()
    {
        $infos = Article::orderBy("id", "asc")->category(1)->get()->paginate(6);
        return view('web.infotbc', ['infos' => $infos]);
    }

    public function showInfo(Article $article)
    {
        return view('web.showInfotbc', ['info' => $article]);
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
        $actions = Article::latest()->category(3)->get()->paginate(12);
        return view('web.kegiatan', ['actions' => $actions]);
    }

    public function showAction(Article $article)
    {
        return view('web.showKegiatan', ['action' => $article]);
    }

    public function case()
    {
        // jumlah patient tiap status di tiap regency
        $regencies = Regency::count('status')->get();
        return view('web.kasustbc', [
            'regencies' => $regencies,
        ]);
    }

    public function showCase(Regency $regency)
    {
        $regency = Regency::count('detailStatus')->find($regency->id);

        if(!$regency) {
            abort(404);
        }

        return view('web.showKasustbc', compact('regency'));
    }

    public function liveSearch(Request $request)
    {
        if ($request->ajax()) {
            $results = match ($request->target) {
                'info-tbc'  => Article::latest()->category(1)->where('title', 'like', '%' . $request->search . '%')->get(),
                'artikel'   => Article::latest()->category(2)->where('title', 'like', '%' . $request->search . '%')->get(),
                'kegiatan'  => Article::latest()->category(3)->where('title', 'like', '%' . $request->search . '%')->get(),
                default     => []
            };
        }
        return $results;
    }
}
