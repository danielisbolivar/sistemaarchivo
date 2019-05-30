@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> Gavetas </div>

                <div class="panel-body">
                     <p><strong>Nombre: </strong>{{$gaveta->nombre}}</p>
                </div>
            </div>
            <div class="panel panel-footer col-md-12">
                     <a href="{{route('gavetas.index')}}" class="btn-sm btn-primary pull-right">
                            Volver
                        </a>
            </div>
        </div>
    </div>
</div>
@endsection