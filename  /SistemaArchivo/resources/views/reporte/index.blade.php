@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> Informes </div>

                <div class="panel-body">
                	<p>Seleccione una opción:</p><br><br>
                	Semanal: 
                    <a href="{{ route('semanal') }}" class="btn btn-primary">Visualizar</a>
                    <a href="{{ route('semanalD') }}" class="btn btn-primary">Descargar</a><br><br>
                    Mensual: 
                    <a href="{{ route('mensual') }}" class="btn btn-primary">Visualizar</a>
                    <a href="{{ route('mensualD') }}" class="btn btn-primary">Descargar</a><br><br>
                    Anual:
                    <a href="{{ route('anual') }}" class="btn btn-primary">Visualizar</a>
                    <a href="{{ route('anualD') }}" class="btn btn-primary">Descargar</a>
                </div>
        </div>
    </div>
</div>
@endsection