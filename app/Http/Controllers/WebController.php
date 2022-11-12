<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $articles = Article::all()->where('category_id', 2);
        return view('web.index', [
            'articles' => $articles->sortByDesc('created_at')->take(3)
        ]);
    }
    public function about()
    {
        return view('web.tentang');
    }
    public function info()
    {
        $infos = Article::all()->where('category_id', 1);
        return view('web.infotbc', [
            'infos' => $infos
        ]);
    }
    public function showInfo(Article $article)
    {
        return view('web.single_infotbc', [
            'info' => $article
        ]);
    }
    public function case()
    {
        return view('web.kasustbc');
    }
    public function article()
    {
        $articles = Article::all()->where('category_id', 2);
        return view('web.artikel', [
            'articles' => $articles->sortByDesc('created_at')->paginate(12)->withQueryString()
        ]);
    }
    public function showArticle(Article $article)
    {
        return view('web.single_artikel', [
            'article' => $article
        ]);
    }
    public function action()
    {
        $activities = Article::all()->where('category_id', 3);
        return view('web.kegiatan', [
            'activities' => $activities->sortByDesc('created_at')->paginate(12)->withQueryString()
        ]);
    }
    public function showAction(Article $article)
    {
        return view('web.single_kegiatan', [
            'activity' => $article
        ]);
    }
}
