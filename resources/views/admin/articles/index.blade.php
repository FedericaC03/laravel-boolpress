@extends('layouts.app')

@section('content')
    <div class="container">
        
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Author</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($articles as $article)
              <th scope="row">{{$article->id}}</th>
                <td>{{$article->title}}</td>
                <td>{{$article->content}}</td>
                <td>{{$article->user->name}}</td>
                <td>
                   
                    <button type="button" class="btn btn-link">
                        <a href="{{route('admin.articles.show', $article->id)}}">View</a>
                    </button>
                    
                    <button type="button" class="btn btn-success">Edit</button>
                     
                    <form action="{{route("admin.articles.destroy", $article->id)}}" method="POST">
                        @csrf
                        @method("DELETE") 
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
       

    </div>
@endsection