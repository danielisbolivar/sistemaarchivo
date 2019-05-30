@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> Carrera </div>

                <div class="panel-body">
                    <p><strong>Fecha de ingreso: </strong>{{$expediente->fecha_ingreso}}</p>
                    @if ($expediente->fecha_egreso != null)
                        <p><strong>Fecha de egreso: </strong>{{$expediente->fecha_egreso}}</p>
                    @endif
                    <p><strong>Status </strong>{{$expediente->status}}</p>
                    <p><strong>Carpeta </strong>{{$expediente->estudiante->ci}}</p>
                    <p><strong>Archivo </strong>{{$expediente->archivo_id}}</p>
                    <p><strong>Gaveta </strong>{{$expediente->gaveta_id}}</p>
                    
                </div>
            </div>
            <div class="panel panel-footer col-md-12">
                     <a href="{{route('expedientes.index')}}" class="btn-sm btn-primary pull-right">
                            Volver
                        </a>
            </div>
        </div>
    </div>
</div>
@endsection