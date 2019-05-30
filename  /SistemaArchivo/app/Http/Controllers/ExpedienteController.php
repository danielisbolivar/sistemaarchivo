<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExpedienteStoreRequest;
use App\Http\Requests\ExpedienteUpdateRequest;
use App\Expediente;
use App\Carrera;
use App\Estudiante;
use App\Archivo;
use App\Gaveta;




class ExpedienteController extends Controller
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
       

        $expedientes = Expediente::orderBy('id', 'DES')->paginate(10);

        $carreras = Carrera::orderBy('id','ASC')->pluck('nombre','nombre');

           

        return view('expedientes.index', compact('expedientes','carreras'));
    }

    public function search(Request $request)
    {
        $fecha_ingreso = $request->get('fecha_ingreso');
        $ci = $request->get('ci');
        $status = $request->get('status');
        $carrera = $request->get('carrera');
        $estudiante = null;

         if(!empty($carrera))
        {
        $carrera = Carrera::where('nombre', 'LIKE', "%$carrera%")->first();
        }
        


        if(!empty($ci))
        {
            if(!empty($carrera)){
            $estudiante = Estudiante::where('ci', 'LIKE', "%$ci%")->where('carrera_id', $carrera->id)->first();
            }else{
                $estudiante = Estudiante::where('ci', 'LIKE', "%$ci%")->first();
            }
        }

            $expedientes = Expediente::orderBy('id', 'DES')
                ->fecha_ingreso($fecha_ingreso)
                ->ci($estudiante->id)
                ->status($status)
                ->paginate(10);
       
          
        return view('expedientes.index', compact('expedientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiantes = Estudiante::orderBy('id','DES')->pluck('ci','id');
        $archivos = Archivo::orderBy('id','DES')->pluck('nombre','id');
        $gavetas = Gaveta::orderBy('id','DES')->pluck('nombre','id');
        return view('expedientes.create',compact('estudiantes','archivos','gavetas','date'));
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpedienteStoreRequest $request)
    {
        //$expedientes = Expediente::create($request->all());
        
        $expediente = Expediente::create([
            "fecha_ingreso" => $request->fecha_ingreso,
            "fecha_egreso" => $request->fecha_egreso,
            "status"=> $request->status,
            "estudiante_id" => $request->estudiante_id,
            "archivo_id" => $request->archivo_id,
            "gaveta_id" => $request->gaveta_id,
        ]);


        return redirect()->route('expedientes.index')->with('info', 'Expediente Registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Expediente $expediente)
    {   
        return view('expedientes.show', compact('expediente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expediente $expediente)
    {
        $estudiantes = Estudiante::orderBy('id','ASC')->pluck('ci','id');
        $archivos = Archivo::orderBy('id','ASC')->pluck('nombre','id');
        $gavetas = Gaveta::orderBy('id','ASC')->pluck('nombre','id');
        return view('expedientes.edit', compact('expediente','estudiantes','archivos','gavetas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpedienteUpdateRequest $request, $id)
    {
            $expediente = Expediente::find($id);
        //$expediente->update($request->all());
            $expediente->fecha_ingreso = $request->fecha_ingreso;
            $expediente->fecha_egreso = $request->fecha_egreso;
            $expediente->status = $request->status;
            $expediente->estudiante_id = $request->estudiante_id;
            $expediente->archivo_id = $request->archivo_id;
            $expediente->gaveta_id = $request->gaveta_id;
            $expediente->update();

        return redirect()->route('expedientes.index')->with('info', 'Expediente Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Expediente $expediente)
    {
        $expediente->delete();

        return back()->with('info', 'Eliminado con éxito');
    }
}
