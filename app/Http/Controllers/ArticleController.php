<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;

class ArticleController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Article::class, 'article');
    }

    /**
     * Get the map of resource methods to ability names.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
        return [
            'index'       => 'viewAny',
            'show'        => 'view',
            'create'      => 'create',
            'store'       => 'create',
            'edit'        => 'update',
            'update'      => 'update',
            'destroy'     => 'delete',
            'restore'     => 'restore',
            'forceDelete' => 'forceDelete'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = request()->segments()[1];
        if ($category == "infos") {
            $articles = Article::latest()->category(1);
            $title = 'Info TBC';
            $createRoute = 'admin.infotbc.create';
            $showRoute = 'admin.infotbc.show';
            $editRoute = 'admin.infotbc.edit';
        } else if ($category == "articles") {
            $articles = Article::latest()->category(2);
            $title = 'Artikel';
            $createRoute = 'admin.articles.create';
            $showRoute = 'admin.articles.show';
            $editRoute = 'admin.articles.edit';
        } else if ($category == "actions") {
            $articles = Article::latest()->category(3);
            $title = 'Kegiatan';
            $createRoute = 'admin.kegiatan.create';
            $showRoute = 'admin.kegiatan.show';
            $editRoute = 'admin.kegiatan.edit';
        } else {
            abort(404);
        };
        (!auth()->user()->role ? $articles->user() : '');
        $articles = $articles->get();
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
        $category = request()->segments()[1];
        if ($category == "infos") {
            $category = 1;
            $title = 'Info TBC';
        } else if ($category == "articles") {
            $category = 2;
            $title = 'Artikel';
        } else if ($category == "actions") {
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
        $request = $request->validated();
        $request['img'] = $request['img']->store('img/articles');
        $route = match ($request['category_id']) {
            '1' => 'admin.infotbc.show',
            '2' => 'admin.articles.show',
            '3' => 'admin.kegiatan.show'
        };
        $article = Article::create($request);
        (!$article ? Storage::delete($request['img']) : '');
        return redirect()->route($route, $article);
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
        return view('admin.article.show', compact('article', 'editRoute'));
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
            $title = 'Info TBC';
        } else if (request()->routeIs('admin.articles.edit')) {
            $title = 'Artikel';
        } else if (request()->routeIs('admin.kegiatan.edit')) {
            $title = 'Kegiatan';
        } else {
            abort(404);
        }

        return view('admin.article.edit', compact('article', 'title'));
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
        $validated = $request->validated();
        if (isset($validated['img'])) {
            $oldImg = $article->img;
            $validated['img'] = $validated['img']->store('img/articles');
        };
        $article->update($validated);

        isset($validated['img']) ? ($article->wasChanged() ? Storage::delete($oldImg) : Storage::delete($validated['img'])) : '';

        $category = (request()->segments()[1]);
        $category == "infos" ? $route = 'admin.infotbc.show'
            : ($category == "articles" ? $route = 'admin.articles.show'
                : ($category == "actions" ? $route = 'admin.kegiatan.show' : $route = null));
        return redirect()->route($route, $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $category = $article->category_id;
        $article->delete();
        return match ($category) {
            1 => redirect()->route('admin.infotbc.index'),
            2 => redirect()->route('admin.articles.index'),
            3 => redirect()->route('admin.kegiatan.index')
        };
    }

    public function restore(Article $article)
    {
        $article->getDeletedAtColumn() ? $article->restore() : '';
        return redirect()->back();
    }

    public function forceDelete(Article $article)
    {
        $ext = collect(explode('.',$article->img));
        // dd($ext);
        $base64img = base64_encode(file_get_contents(storage_path('app/public/' . $article->img)));
        $base64img = "data:image/{$ext};base64, {$base64img}";
        $ext = explode('/', explode(':', substr($base64img, 0, strpos($base64img, ';')))[1])[1]; 
        dd($base64img,$ext);
        Storage::delete($article->img);
        $article->forceDelete();
        $category = $article->category_id;
        return match ($category) {
            1 => redirect()->route('admin.infotbc.index'),
            2 => redirect()->route('admin.articles.index'),
            3 => redirect()->route('admin.kegiatan.index')
        };
    }
}
