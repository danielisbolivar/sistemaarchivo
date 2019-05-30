@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> Carrera </div>

                <div class="panel-body">
                    <p><strong>Código: </strong>{{$carrera->codigo}}</p>
                     <p><strong>Nombre: </strong>{{$carrera->nombre}}</p>
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