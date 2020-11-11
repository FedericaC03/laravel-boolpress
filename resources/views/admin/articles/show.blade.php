@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>{{$article->title}}</h1>
    <div>
        <img src=" {{ asset('storage/'.$article->image) }}" alt="">
    </div>
    <p>{{$article->content}}</p>

        <form action="{{route("admin.articles.destroy", $article->id)}}" method="POST">
            @csrf
            @method("DELETE") 
            <input type="submit" value="Cancella">
        </form>
    </div>

@endsection