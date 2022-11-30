<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'index'        => 'viewAny',
            'trashed'      => 'viewTrash',
            'show'         => 'view',
            'create'       => 'create',
            'store'        => 'create',
            'edit'         => 'update',
            'update'       => 'update',
            'destroy'      => 'delete',
            'restore'      => 'restore',
            'forceDelete'  => 'forceDelete',
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

    public function trashed()
    {
        return Article::onlyTrashed()->get();
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
        $request['contents'] = $this->contentDecode($request['contents']);
        $request['img'] = $request['img']->store('img/articles');
        $route = match ($request['category_id']) {
            '1' => 'admin.infotbc.show',
            '2' => 'admin.articles.show',
            '3' => 'admin.kegiatan.show'
        };
        $article = Article::create($request);
        (!$article ? Storage::delete($request['img']) : '');
        return to_route($route, $article);
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
            $indexRoute = 'admin.infotbc.index';
        } else if (request()->routeIs('admin.articles.show')) {
            $editRoute = 'admin.articles.edit';
            $indexRoute = 'admin.articles.index';
        } else if (request()->routeIs('admin.kegiatan.show')) {
            $editRoute = 'admin.kegiatan.edit';
            $indexRoute = 'admin.kegiatan.index';
        } else {
            abort(404);
        }
        return view('admin.article.show', compact('article', 'editRoute', 'indexRoute'));
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
        $validated['contents'] = $this->contentDecode($validated['contents']);
        $article->update($validated);

        isset($validated['img']) ? ($article->wasChanged() ? Storage::delete($oldImg) : Storage::delete($validated['img'])) : '';

        $category = (request()->segments()[1]);
        $category == "infos" ? $route = 'admin.infotbc.show'
            : ($category == "articles" ? $route = 'admin.articles.show'
                : ($category == "actions" ? $route = 'admin.kegiatan.show' : $route = null));
        return to_route($route, $article);
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
            1 => to_route('admin.infotbc.index'),
            2 => to_route('admin.articles.index'),
            3 => to_route('admin.kegiatan.index')
        };
    }

    public function restore(Article $article)
    {
        $article->getDeletedAtColumn() ? $article->restore() : '';
        return redirect()->back();
    }

    public function forceDelete(Article $article)
    {
        str($article->contents)->contains('<img src="http://sekawans-jember.test/storage/img/articles/contents/') ?
            str($article->contents)->matchAll('/<img[^>]+src="([^">]+)/')->each(fn ($src) =>
            Storage::delete(str($src)->remove('http://sekawans-jember.test/storage/'))) : '';
        Storage::delete($article->img);
        $category = $article->category_id;
        $article->forceDelete();
        return match ($category) {
            1 => to_route('admin.infotbc.index'),
            2 => to_route('admin.articles.index'),
            3 => to_route('admin.kegiatan.index')
        };
    }

    public function contentEncode($contents)
    {
        $ext = collect(explode('.', $contents))->last();
        $base64 = base64_encode(file_get_contents(storage_path('app/public/' . $contents)));
        $base64 = "data:image/{$ext};base64, {$base64}";
        return $base64;
    }

    public function contentDecode($contents)
    {
        $count = Str::substrCount($contents, ';base64,');
        // dd($contents);
        for ($i = 0; $i < $count; $i++) {
            $base64 = Str::of(Str::of($contents)->explode(' src="data:')[1])->explode('" ')[0];
            $contents = Str::of($contents)->replace('data:' . $base64, '??');
            $ext = Str::of(Str::of(Str::of($contents)->explode('data-filename="')[$i + 1])->explode('"')[0])->explode('.')[1];
            $base64 = Str::of($base64)->explode(',')[1];
            $img = base64_decode(Str::of($base64));
            do {
                $imgName = 'img/articles/contents/' . Str::random(80) . '.' . $ext;
                $status = Storage::get($imgName);
            } while ($status);
            $status = Storage::put($imgName, $img);
            $contents = Str::of($contents)->replace('??', asset('storage/' . $imgName));
        }
        // dd($contents);
        return $contents;
    }
}
