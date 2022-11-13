<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\StaticElement;
use App\Models\Article;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $about = StaticElement::find(1);
        preg_match('/^([^.!?]*[.!?]+){0,2}/', strip_tags($about->contents), $about);
        // $patient = Patient::latest()->get()->take(10);
        $articles = Article::latest()->category(2)->get()->take(3);
        return view('web.index', ['articles' => $articles]);
    }

    public function structur()
    {
        return view('tentang.struktur');
    }

    public function showCase()
    {
        return view('kasus_tbc.kasustbc');
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
        return view('web.kasustbc');
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
