@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> Carrera </div>

                <div class="panel-body">
                     {!!Form::open(['route' => ['expedientes.store']]) !!}
                        <div class="form group">
                            <h4>¿El expediente fue ingresado Antes del Año 2010?</h4>
                            <p class="text-muted">Seleccione una opción para agregar la fecha de ingreso</p>
                            <a id="si" class="btn btn-md btn-success">Sí</a> 
                            <a id="no" class="btn btn-md btn-danger">no</a>

                        </div>
                        
                            <div class="form-group{{ $errors->has('fecha_ingreso') ? ' has-error' : '' }}">
                                    {{ Form::label('fecha_ingreso', 'Fecha de ingreso')}}
                                    <br>
                                    {{ Form::date('fecha_ingreso', null, ['class'=> 'form-control', 'id' => 'ingreso','disabled'])}}
                                     @if ($errors->has('fecha_ingreso'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fecha_ingreso') }}</strong>
                                        </span>
                                    @endif
                                    

                            </div>
                            <div class="form-group">
                                    {{ Form::label('fecha_egreso', 'Fecha de Egreso')}}
                                    <br>
                                    {{ Form::date('fecha_egreso',null)}}
                                     @if ($errors->has('fecha_egreso'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fecha_egreso') }}</strong>
                                        </span>
                                    @endif

                            </div>

                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                {{ Form::label('status', 'Status del Expediente:') }}<br>
                                    <label>
                                        {{ Form::radio('status', 'Disponible'), ['class'=> 'form-control'] }} Disponible
                                    </label><br>
                                    <label>
                                        {{ Form::radio('status', 'Perdido'), ['class'=> 'form-control']  }} Perdido
                                    </label>
                                    <div id="retirado" style="display: none;">
                                        <label>
                                            {{ Form::radio('status', 'Retirado'), ['class'=> 'form-control']  }} Retirado
                                        </label>
                                    </div>
                                    <div id="prestado" style="display: none;">
                                        <label id="prestado">
                                            {{ Form::radio('status', 'Prestado'), ['class'=> 'form-control']  }} Prestado
                                        </label>
                                    </div>
                                     @if ($errors->has('status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        <div class="form-group{{ $errors->has('estudiante_id') ? ' has-error' : '' }}">
                            {{ Form::label('estudiante_id', 'Carpeta') }}
                            {{ Form::select('estudiante_id', $estudiantes, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true']) }}
                             @if ($errors->has('estudiante_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('estudiante_id') }}</strong>
                                        </span>
                                    @endif
                        </div>
                        <div class="form-group{{ $errors->has('archivo_id') ? ' has-error' : '' }}">
                            {{ Form::label('archivo_id', 'Archivo') }}
                            {{ Form::select('archivo_id', $archivos, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true']) }}
                             @if ($errors->has('archivo_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('archivo_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('gaveta_id') ? ' has-error' : '' }}">
                            {{ Form::label('gaveta_id', 'Gaveta') }}
                            {{ Form::select('gaveta_id', $gavetas, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true']) }}
                             @if ($errors->has('gaveta_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gaveta_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                                {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-success'])}}
                        </div>
                                            
                    {!! Form::close() !!}
                        </div>
                        <div class="panel panel-footer col-md-12">
                            <a href="{{route('expedientes.index')}}" class="btn-sm btn-primary pull-right">
                                    Volver
                                </a>
                        </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
  $(document).ready(function() {      
        window.onload = function() {
            document.querySelector("#retirado").style.display = 'none';
        }
        document.querySelector("#si").addEventListener('click',function(e) {
            var oculto = document.querySelector("#retirado");
            if (oculto.style.display=='block') {
                oculto.style.display='none';

            }else {
                oculto.style.display='block';
            $('#ingreso').prop("disabled", false);
            }if(oculto.style.display='block'){
                oculto = document.querySelector("#prestado");
                oculto.style.display='none';
            }
            
        });

     });  
       
</script>
<script>
  $(document).ready(function() {      
        window.onload = function() {
            document.querySelector("#prestado").style.display = 'none';
        }
        document.querySelector("#no").addEventListener('click',function(e) {
            var oculto = document.querySelector("#prestado");
            if (oculto.style.display=='block') {
                oculto.style.display='none';
            }else {
                oculto.style.display='block';
              $('#ingreso').prop("disabled", false);
            }if(oculto.style.display='block'){
                oculto = document.querySelector("#retirado");
                oculto.style.display='none';
            }
        });

     });  
       
</script>
<script>
$('.selectpicker').selectpicker({
  style: 'btn-warning',
  size: 4
});
</script>

@endpush

@endsection