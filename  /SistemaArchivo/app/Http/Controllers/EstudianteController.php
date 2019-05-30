<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EstudianteStoreRequest;
use App\Http\Requests\EstudianteUpdateRequest;
use App\Estudiante;
use App\Carrera;



class EstudianteController extends Controller
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
        $estudiantes = Estudiante::orderBy('id', 'ASC')->paginate(15);

        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = Carrera::orderBy('codigo','ASC')->pluck('nombre','id');
        return view('estudiantes.create',compact('carreras'));
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstudianteStoreRequest $request)
    {
        //$estudiantes = Estudiante::create($request->all());
        
        $estudiante = Estudiante::create([
            "nacionalidad" => $request->nacionalidad,
            "ci" => $request->ci,
            "nombre"=> $request->nombre,
            "apellido" => $request->apellido,
            "sexo" => $request->sexo,
            "telefono" => $request->telefono,
            "direccion" => $request->direccion,
            "correo"=> $request->correo,
            "carrera_id"=> $request->carrera_id,
        ]);


        return redirect()->route('estudiantes.index')->with('info', 'Estudiante Registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {   
        return view('estudiantes.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
         $carreras = Carrera::orderBy('codigo','ASC')->pluck('nombre','id');
        return view('estudiantes.edit', compact('estudiante','carreras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstudianteUpdateRequest $request, $id)
    {
            $estudiante = Estudiante::find($id);
        //$estudiante->update($request->all());
            $estudiante->nacionalidad = $request->nacionalidad;
            $estudiante->ci = $request->ci;
            $estudiante->nombre = $request->nombre;
            $estudiante->apellido = $request->apellido;
            $estudiante->sexo = $request->sexo;
            $estudiante->telefono = $request->telefono;
            $estudiante->direccion = $request->direccion;
            $estudiante->correo = $request->correo;
            $estudiante->carrera_id = $request->carrera_id;
            $estudiante->update();

        return redirect()->route('estudiantes.index')->with('info', 'Estudiante Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
