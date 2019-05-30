@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> Datos del Estudiante </div>

                <div class="panel-body">
                    <p><strong>Cedula: </strong>{{$estudiante->nacionalidad.$estudiante->ci}}</p>
                     <p><strong>Apellidos y nombres: </strong>{{$estudiante->apellido.' '.$estudiante->nombre}}</p>
                     <p><strong>Género: </strong>{{$estudiante->sexo}}</p>
                     <p><strong>Teléfono: </strong>{{$estudiante->telefono}}</p>
                     <p><strong>Dirección: </strong>{{$estudiante->direccion}}</p>
                     <p><strong>Correo Electrónico: </strong>{{$estudiante->correo}}</p>
                     <p><strong>Carrera: </strong>{{$estudiante->carrera->nombre}}</p>
                </div>
            </div>
            <div class="panel panel-footer col-md-12">
                     <a href="{{route('carreras.index')}}" class="btn-sm btn-primary pull-right">
                            Volver
                        </a>
            </div>
        </div>
    </div>
</div>
@endsection