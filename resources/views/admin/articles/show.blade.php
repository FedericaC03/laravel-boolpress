@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>{{$article->title}}</h1>
    <div>
        <img class="img-responsive w-100" src=" {{ asset('storage/'.$article->image) }}" alt="">
    </div>
    <p>{{$article->content}}</p>

        <form action="{{route("admin.articles.destroy", $article->id)}}" method="POST">
            @csrf
            @method("DELETE") 
            <input class="btn btn-danger" type="submit" value="Cancella">
        </form>
    </div>

@endsection