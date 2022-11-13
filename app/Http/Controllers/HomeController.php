<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(Article::latest()->category(1)->get()->take(5));
        $info = Article::latest()->category(1)->get()->count();
        $article = Article::latest()->category(2)->get()->count();
        $action = Article::latest()->category(3)->get()->count();

        return view('admin.dashboard', ['total' => collect([$info, $article, $action]),]);
    }
}
