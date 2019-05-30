<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarreraStoreRequest;
use App\Http\Requests\CarreraUpdateRequest;
use App\Carrera;



class CarreraController extends Controller
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
        $carreras = Carrera::orderBy('id', 'ASC')->paginate(18);

        return view('carreras.index', compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carreras.create');
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarreraStoreRequest $request)
    {
        $carreras = Carrera::create($request->all());
        

        return redirect()->route('carreras.index')->with('info', 'Carrera Registrada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {   
        return view('carreras.show', compact('carrera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        return view('carreras.edit', compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarreraUpdateRequest $request, Carrera $carrera)
    {
        $carrera->update($request->all());
        return redirect()->route('carreras.index', $carrera->id)->with('info', 'Carrera Actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();

        return back()->with('info', 'Eliminado con éxito');
    }
}
