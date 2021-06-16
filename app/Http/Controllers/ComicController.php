<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $comics = Comic::all();
        //passo i fumetti alla view
        $data = [
            'comics' => $comics
        ];

        
        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //richiamo la funzione per la validazione del form
        $request->validate($this->getValidationRules() );


        $form_data = $request->all();
        $comic = new Comic();

        $comic->fill($form_data);
        $comic->save();

        //redirect alla pagina del dettaglio
        return redirect()->route('comics.show', [
            'comic' => $comic->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // far vedere dettagli singolo fumetto
        $comic = Comic::findOrFail($id);

        $data = [
            'comic' => $comic
        ];
        
        return view('comics.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);

        $data= [
            'comic' => $comic
        ];
        
        return view('comics.edit', $data);
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
        //richiamo la funzione per la validazione del form
        $request->validate($this->getValidationRules() );

        $form_data = $request->all();

        $comic_to_modify = Comic::find($id);
        $comic_to_modify->update($form_data);

        //redirect alla pagina del dettaglio
        return redirect()->route('comics.show', [
            'comic' => $comic_to_modify->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic_to_delete = Comic::find($id);

        $comic_to_delete->delete();

        return redirect()->route('comics.index');

    }



    private function getValidationRules() {
        $validation = [
            'name' => 'required|min:2|max:150',
            'editor' => 'required|max:20',
            'image' => 'required|max:255',
            'genre' => 'required|max:50',
            'price' => 'required|between:0,99.99',
        ];

        return $validation;
    }
}
