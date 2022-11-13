<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->where('category_id', 2)->get()->take(3);
        return view('web.index', [
            'articles' => $articles
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
        $articles = Article::latest()->where('category_id', 2)->get();
        return view('web.artikel', [
            'articles' => $articles->paginate(12)->withQueryString()
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
        $actions = Article::latest()->where('category_id', 3)->get();
        return view('web.kegiatan', [
            'actions' => $actions->paginate(12)->withQueryString()
        ]);
    }
    public function showAction(Article $article)
    {
        return view('web.single_kegiatan', [
            'action' => $article
        ]);
    }
}
