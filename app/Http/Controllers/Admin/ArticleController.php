<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use App\article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        // $articles = Article::all();
        $articles = Article::where('user_id', $user_id)->get();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.articles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            "title"=> "required|max:50",
            "content"=> "required",    
            "image"=>"image"   
        ]);

        $path = Storage::disk('public')->put('images', $data['image']);
        $newArticle = new Article;
        $newArticle->user_id = Auth::id();
        $newArticle->title = $data["title"];
        $newArticle->content = $data["content"];
        $newArticle->image = $path;

       
        $newArticle->save();
        Mail::to( $newArticle->user->email)->send(new SendNewMail($newArticle));

        return redirect()->route("admin.articles.show", $newArticle->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::where("id", $id)->first();
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::where("id", $id)->first();

        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $request->validate([
            "title"=> "required|max:50",
            "content"=> "required",    
            "image"=>"image"   
        ]);

       
        $article = Article::find($id); 
    
        $article->update($data);
        return redirect()->route('admin.articles.show', $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = article::find($id);
        $article->delete();
        return redirect()->route("admin.articles.index")->withSuccess(["Post deleted successfully"]);

    }
}
