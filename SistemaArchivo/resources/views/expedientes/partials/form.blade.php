 <div class="col-md-6"><div class="form-group{{ $errors->has('fecha_ingreso') ? ' has-error' : '' }}">
            {{ Form::label('fecha_ingreso', 'Fecha de ingreso')}}
            <br>
            {{ Form::date('fecha_ingreso', null, ['class'=> 'form-control', 'id' => 'ingreso'])}}
             @if ($errors->has('fecha_ingreso'))
                <span class="help-block">
                    <strong>{{ $errors->first('fecha_ingreso') }}</strong>
                </span>
            @endif
            

    </div>
</div>
 <div class="col-md-6"><div class="form-group">
            {{ Form::label('fecha_egreso', 'Fecha de Egreso')}}
            <br>
            {{ Form::date('fecha_egreso',null, ['class'=> 'form-control'])}}
             @if ($errors->has('fecha_egreso'))
                <span class="help-block">
                    <strong>{{ $errors->first('fecha_egreso') }}</strong>
                </span>
            @endif

    </div>
</div>
 
    
<div class="col-md-12">
    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        {{ Form::label('status', 'Status del Expediente:') }}<br>
        <div class="col-md-3">
             <label>
                {{ Form::radio('status', 'Disponible'), ['class'=> 'form-control'] }} Disponible
            </label>
        </div>
        <div class="col-md-3">
            <label>
                {{ Form::radio('status', 'Perdido'), ['class'=> 'form-control']  }} Perdido
            </label>
        </div>   
        @if ('fecha_ingreso' < '2010-12-31')
            <div class="col-md-3">   
                	 <div id="retirado">
                        <label>
                            {{ Form::radio('status', 'Retirado'), ['class'=> 'form-control']  }} Retirado
                        </label>
                    </div>
            </div>
            @else
                <div class="col-md-3">
            	   <div id="prestado">
                        <label id="prestado">
                            {{ Form::radio('status', 'Prestado'), ['class'=> 'form-control']  }} Prestado
                        </label>
                    </div>
                </div>
            @endif
           
           
             @if ($errors->has('status'))
                <span class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-2">
        <div class="form-group{{ $errors->has('estudiante_id') ? ' has-error' : '' }}">
            {{ Form::label('estudiante_id', 'Carpeta') }}
            {{ Form::select('estudiante_id', $estudiantes, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true']) }}
             @if ($errors->has('estudiante_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('estudiante_id') }}</strong>
                        </span>
                    @endif
        </div>
    </div>
    <div class="col-md-5">   
        <div class="form-group{{ $errors->has('archivo_id') ? ' has-error' : '' }}">
            {{ Form::label('archivo_id', 'Archivo') }}
            {{ Form::select('archivo_id', $archivos, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true']) }}
             @if ($errors->has('archivo_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('archivo_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-5">   
        <div class="form-group{{ $errors->has('gaveta_id') ? ' has-error' : '' }}">
            {{ Form::label('gaveta_id', 'Gaveta') }}
            {{ Form::select('gaveta_id', $gavetas, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true']) }}
             @if ($errors->has('gaveta_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('gaveta_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="form-group">
		{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-success'])}}
</div>