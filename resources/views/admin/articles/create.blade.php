@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <h1>Crea il tuo post</h1>
    <form action="{{route('admin.articles.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("POST")
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo">
            </div>
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Inserisci il contenuto"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Inserisci immagine" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>

    </div>

@endsection