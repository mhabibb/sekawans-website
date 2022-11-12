<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (last(request()->segments()) == "infos") {
            $articles = Article::latest()->where('category_id', '1')->get();
            $title = 'Info TBC';
            $createRoute = 'admin.infotbc.create';
            $showRoute = 'admin.infotbc.show';
        } else if (last(request()->segments()) == "articles") {
            $articles = Article::latest()->where('category_id', '2')->get();
            $title = 'Artikel';
            $createRoute = 'articles.create';
            $showRoute = 'articles.show';
        } else if (last(request()->segments()) == "actions") {
            $articles = Article::latest()->where('category_id', '3')->get();
            $title = 'Kegiatan';
            $createRoute = 'admin.kegiatan.create';
            $showRoute = 'admin.kegiatan.show';
        } else {
            abort(404);
        };

        return view('admin.admin_artikel.index', [
            'title' => $title,
            'articles' => $articles,
            'createRoute' => $createRoute,
            'showRoute' => $showRoute
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
        } else if (request()->routeIs('articles.create')) {
            $category = 2;
            $title = 'Artikel';
        } else if (request()->routeIs('admin.kegiatan.create')) {
            $category = 3;
            $title = 'Kegiatan';
        } else {
            abort(404);
        }

        return view('admin.admin_artikel.create', [
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.admin_artikel.show', [
            'article' => $article
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
        return view('admin.admin_artikel.edit', [
            'article' => $article,
            'category' => 2
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
