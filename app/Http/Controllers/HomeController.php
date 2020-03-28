<?php

namespace App\Http\Controllers;

use App\Article;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $latest_article = Article::orderBy('id', 'DESC')->first();
        $articles = Article::where('id', '!=', $latest_article->id)->orderBy('id', 'DESC')->get()->take(4);
        return view('blog.index', compact('latest_article', 'articles'));
    }

    public function articles(Request $request) {        
        $articles = Article::orderBy('id', 'DESC')->paginate(5);
        if($request->ajax()) {
            return view('blog.load_articles', compact('articles'));
        }
        return view('blog.articles', compact('articles'));
    }

    public function show(Request $request, $id) {
        $article = Article::findOrFail($id);
        return view('blog.show', compact('article'));
    }
}
