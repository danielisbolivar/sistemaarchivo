<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArchivoStoreRequest;
use App\Http\Requests\ArchivoUpdateRequest;
use App\Archivo;



class ArchivoController extends Controller
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
        $archivos = Archivo::orderBy('id', 'DES')->paginate();

        return view('archivos.index', compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archivos.create');
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArchivoStoreRequest $request)
    {
        $archivos = Archivo::create($request->all());
        

        return redirect()->route('archivos.index')->with('info', 'Archivo Registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Archivo $archivo)
    {   
        return view('archivos.show', compact('archivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $archivo)
    {
        return view('archivos.edit', compact('archivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArchivoUpdateRequest $request, Archivo $archivo)
    {
        $archivo->update($request->all());
        return redirect()->route('archivos.index', $archivo->id)->with('info', 'Archivo Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        $archivo->delete();

        return back()->with('info', 'Eliminado con éxito');
    }
}
