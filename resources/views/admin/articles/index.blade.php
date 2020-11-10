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
                    <a href="{{route('admin.articles.show', $article->id)}}">View</a>
                    edit 
                    delete
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>
       

    </div>
@endsection