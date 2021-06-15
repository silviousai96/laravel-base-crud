@extends('layouts.app')

@section('main_content')
    <div class="container">
        <h1>Crea nuovo prodotto</h1>

        {{-- create form --}}

        <form action="{{route('comics.store')}}" method="post">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name" >
            </div>

            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="editor">Editore</label>
                <input type="text" class="form-control" name="editor" id="editor" >
            </div>

            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="text" class="form-control" name="image" id="image" >
            </div>

            <div class="form-group">
                <label for="genre">Genere</label>
                <input type="text" class="form-control" name="genre" id="genre" >
            </div>

            <div class="form-group">
                <label for="price">Prezzo</label>
                <input type="text" class="form-control" name="price" id="price" >
            </div>

            <input type="submit" value="Salva nuovo prodotto">
        </form>

        {{-- end create form --}}

    </div>
@endsection