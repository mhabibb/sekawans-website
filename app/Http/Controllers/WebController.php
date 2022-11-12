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
        return view('web.infotbc');
    }
    public function showInfo()
    {
        return view('web.single_infotbc');
    }
    public function case()
    {
        return view('web.kasustbc');
    }
    public function article()
    {
        return view('web.artikel');
    }
    public function showArticle()
    {
        return view('web.single_artikel');
    }
    public function action()
    {
        return view('web.kegiatan');
    }
    public function showAction()
    {
        return view('web.single_kegiatan');
    }
}
