@extends('layouts.app')

@section('main_content')
    <div class="container">
        <h1>Modifica prodotto</h1>

        <h2>Nome prodotto: {{$comic->name}}</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- edit form --}}

        <form action="{{route('comics.update', ['comic'=>$comic->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $comic->name}}">
            </div>

            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10"> {{ $comic->description}} </textarea>
            </div>

            <div class="form-group">
                <label for="editor">Editore</label>
                <input type="text" class="form-control" name="editor" id="editor" value="{{ $comic->editor}}">
            </div>

            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="text" class="form-control" name="image" id="image" value="{{ $comic->image}}">
                <img style="max-height: 100px" src="{{ $comic->image}}" alt="">
            </div>

            <div class="form-group">
                <label for="genre">Genere</label>
                <input type="text" class="form-control" name="genre" id="genre" value="{{ $comic->genre}}">
            </div>

            <div class="form-group">
                <label for="price">Prezzo</label>
                <input type="text" class="form-control" name="price" id="price" value="{{ $comic->price}}">
            </div>

           

            <input type="submit" value="Modifica prodotto">
        </form>

        {{-- end edit form --}}

        </div>
    </div>
@endsection