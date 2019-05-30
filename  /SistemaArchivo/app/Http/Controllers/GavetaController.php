<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GavetaStoreRequest;
use App\Http\Requests\GavetaUpdateRequest;
use App\Gaveta;



class GavetaController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gavetas = Gaveta::orderBy('id', 'DES')->paginate();

        return view('gavetas.index', compact('gavetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gavetas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GavetaStoreRequest $request)
    {
        $gavetas = Gaveta::create($request->all());
        

        return redirect()->route('gavetas.index')->with('info', 'Gaveta Registrada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gaveta $gaveta)
    {   
        return view('gavetas.show', compact('gaveta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gaveta $gaveta)
    {
        return view('gavetas.edit', compact('gaveta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GavetaUpdateRequest $request, Gaveta $gaveta)
    {
        $gaveta->update($request->all());
        return redirect()->route('gavetas.index', $gaveta->id)->with('info', 'Gaveta Actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gaveta $gaveta)
    {
        $gaveta->delete();

        return back()->with('info', 'Eliminado con éxito');
    }
}
