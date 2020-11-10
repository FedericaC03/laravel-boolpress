<?php

namespace App\Http\Controllers;
use App\article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
        {
            $articles = Article::all();
            return view('guest.articles.index', compact("articles"));
        }

    public function show($id)
    {
        $article = Article::where("id", $id)->first();
        return view('guest.articles.show', compact('article'));
    }
    
}
