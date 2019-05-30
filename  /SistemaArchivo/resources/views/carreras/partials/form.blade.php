<div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
		{{ Form::label('codigo', 'Código de la Carrera')}}
		{{ Form::text('codigo', null, ['class'=> 'form-control', 'required'])}}
		  @if ($errors->has('codigo'))
            <span class="help-block">
                <strong>{{ $errors->first('codigo') }}</strong>
            </span>
        @endif

</div>
<div class="form-group">
		{{ Form::label('nombre', 'Nombre de la Carrera')}}
		{!! Form::textarea('nombre',null,['class'=>'form-control', 'required',  'rows' => 2, 'cols' => 40]) !!}
</div>

<div class="form-group">
		{{ Form::label('localizacion', 'Localización')}}
		{!! Form::textarea('localizacion',null,['class'=>'form-control', 'required',  'rows' => 2, 'cols' => 40]) !!}
</div>
<div class="form-group">
		{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-success'])}}
</div>