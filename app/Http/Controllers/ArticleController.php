<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $articles = Article::when($request->has("keyword"), function($query) use ($request) {
        $keyword = $request->keyword;
        $query->where("title", "like", "%" . $keyword . "%")
              ->orWhere("description", "like", "%" . $keyword . "%");
    })
    ->latest('id')
    ->paginate(7)
    ->withQueryString();

    return view('article.index', compact('articles'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // ArticleController.php
    public function store(StoreArticleRequest $request)
    {
        return $request;
        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->creator_name = auth()->user()->name; // Example for creator_name, adjust as needed
        $article->user_id = auth()->user()->id; // Assign the authenticated user's id

        $article->save();

        return redirect()->route('article.index')->with('msg', 'Article created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('article.index')->with('msg', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {

        $article->delete();
        return redirect()->back()->with('msg', 'Article deleted successfully');
    }
}
