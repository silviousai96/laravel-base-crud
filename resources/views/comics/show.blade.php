@extends('layouts.app')

@section('main_content')
    <div class="container">
        <h2>Dettagli fumetto</h2>
        <h3>Nome fumetto: {{$comic->name}}</h3>

        <div>
            <img src="{{$comic->image}}" alt="">
        </div>

        <p>{{$comic->description}}</p>

        <h3>Editore: {{$comic->editor}}</h3>
        <h3>Genere: {{$comic->genre}}</h3>
        <h3>Prezzo: €{{$comic->price}}</h3>

    </div>
@endsection