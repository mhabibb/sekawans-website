<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // last(request()->segments()) == "info" ? $article = Article::latest()->category(1)->get()
        //     : (last(request()->segments()) == "article" ? $article = Article::latest()->category(2)->get()
        //         : (last(request()->segments()) == "action" ? $article = Article::latest()->category(3)->get() : abort(404)));
        // return view('admin.artikel.index', $article);

        if (last(request()->segments()) == "infos") {
            $articles = Article::latest()->where('category_id', '1')->get();
            $title = 'Info TBC';
            $createRoute = 'admin.infotbc.create';
            $showRoute = 'admin.infotbc.show';
            $editRoute = 'admin.infotbc.edit';
        } else if (last(request()->segments()) == "articles") {
            $articles = Article::latest()->where('category_id', '2')->get();
            $title = 'Artikel';
            $createRoute = 'admin.articles.create';
            $showRoute = 'admin.articles.show';
            $editRoute = 'admin.articles.edit';
        } else if (last(request()->segments()) == "actions") {
            $articles = Article::latest()->where('category_id', '3')->get();
            $title = 'Kegiatan';
            $createRoute = 'admin.kegiatan.create';
            $showRoute = 'admin.kegiatan.show';
            $editRoute = 'admin.kegiatan.edit';
        } else {
            abort(404);
        };
        return view('admin.article.index', [
            'title' => $title,
            'articles' => $articles,
            'createRoute' => $createRoute,
            'showRoute' => $showRoute,
            'editRoute' => $editRoute
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->routeIs('admin.infotbc.create')) {
            $category = 1;
            $title = 'Info TBC';
        } else if (request()->routeIs('admin.articles.create')) {
            $category = 2;
            $title = 'Artikel';
        } else if (request()->routeIs('admin.kegiatan.create')) {
            $category = 3;
            $title = 'Kegiatan';
        } else {
            abort(404);
        }

        return view('admin.article.create', [
            'category' => $category,
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        if (request()->routeIs('admin.infotbc.show')) {
            $editRoute = 'admin.infotbc.edit';
        } else if (request()->routeIs('admin.articles.show')) {
            $editRoute = 'admin.articles.edit';
        } else if (request()->routeIs('admin.kegiatan.show')) {
            $editRoute = 'admin.kegiatan.edit';
        } else {
            abort(404);
        }
        return view('admin.article.show', [
            'article' => $article,
            'editRoute' => $editRoute
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if (request()->routeIs('admin.infotbc.edit')) {
            $category = 1;
            $title = 'Info TBC';
        } else if (request()->routeIs('admin.articles.edit')) {
            $category = 2;
            $title = 'Artikel';
        } else if (request()->routeIs('admin.kegiatan.edit')) {
            $category = 3;
            $title = 'Kegiatan';
        } else {
            abort(404);
        }

        return view('admin.article.edit', [
            'article' => $article,
            'category' => $category,
            'title' => $title
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        dd($request, $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        dd($article);
    }
}
