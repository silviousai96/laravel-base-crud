@extends('layouts.app')

@section('main_content')
    <div class="container">
        <h1>Lista fumetti</h1>

        <div class="row">
           
            @foreach ($comics as $comic)
                            
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{$comic->image}}" class="card-img-top" alt="...">

                        <div class="card-body">

                        <h5 class="card-title">{{$comic->name}}</h5>
                        
                        <p class="card-text">{{$comic->editor}}</p>

                        <a href="{{ route('comics.show', [
                            'comic' => $comic->id
                        ]) }}" class="btn btn-primary">
                          Dettagli
                        </a>

                        <a href="{{ route('comics.edit', [
                            'comic' => $comic->id
                        ]) }}" class="btn btn-secondary">
                          Modifica prodotto
                        </a>

                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
@endsection