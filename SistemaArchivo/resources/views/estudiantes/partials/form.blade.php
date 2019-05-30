<div class="col-md-4 col-sm-4">
	<div class="form-group{{ $errors->has('ci') ? ' has-error' : '' }}">
		{{ Form::label('ci', 'Cédula de identidad')}}
		<br>
		<div class="col-md-3 col-sm-3">
			{{ Form::select('nacionalidad', ['V' => 'V', 'E' => 'E',], ['class' => 'form-control', 'required']) }}
		</div>
		<div class="col-md-9 col-sm-9">
			{{ Form::text('ci', null, ['class'=> 'form-control', 'required'])}}
		 @if ($errors->has('ci'))
            <span class="help-block">
                <strong>{{ $errors->first('ci') }}</strong>
            </span>
        @endif
		</div>
	</div>	
</div>
<div class="col-md-4 col-sm-4">
	<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
			{{ Form::label('nombre', 'Nombres del Estudiante')}}
			<br>
			{{ Form::text('nombre', null, ['class'=> 'form-control', 'required'])}}
			 @if ($errors->has('nombre'))
	            <span class="help-block">
	                <strong>{{ $errors->first('nombre') }}</strong>
	            </span>
	        @endif

	</div>
</div>
<div class="col-md-4 col-sm-4">
	<div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
			{{ Form::label('apellido', 'Apellidos del Estudiante')}}
			<br>
			{{ Form::text('apellido', null, ['class'=> 'form-control', 'required'])}}
			@if ($errors->has('apellido'))
	            <span class="help-block">
	                <strong>{{ $errors->first('apellido') }}</strong>
	            </span>
	        @endif

	</div>
</div>
<div class="col-md-3 col-sm-3">
	<div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
		{{ Form::label('sexo', 'Género') }}
		<div class="col-md-12">
			<div class="col-md-6">
				<label>
					{{ Form::radio('sexo', 'femenino') }} F
			</label>
			</div>
			<div class="col-md-6">
				<label>
					{{ Form::radio('sexo', 'masculino') }} M
				</label>
			</div>
			
			@if ($errors->has('sexo'))
	            <span class="help-block">
	                <strong>{{ $errors->first('sexo') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>
</div>

	
<div class="col-md-3 col-sm-3">
	<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
		{{ Form::label('telefono', 'Telefono de contacto')}}
		<br>
		{{ Form::text('telefono', null, ['class'=> 'form-control', 'required', 'type' => 'number'])}}
		@if ($errors->has('telefono'))
            <span class="help-block">
                <strong>{{ $errors->first('telefono') }}</strong>
            </span>
        @endif

	</div>
</div>
<div class="col-md-6 col-sm-6">
	<div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
		{{ Form::label('correo', 'Correo')}}
		<br>
		{{ Form::email('correo', null, ['class'=> 'form-control', 'required'])}}
		@if ($errors->has('correo'))
            <span class="help-block">
                <strong>{{ $errors->first('correo') }}</strong>
            </span>
        @endif
	</div>
</div>
<div class="col-md-6 col-sm-6">
	<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
			{{ Form::label('direccion', 'Dirección')}}
			{!! Form::textarea('direccion',null,['class'=>'form-control', 'required',  'rows' => 2, 'cols' => 40]) !!}
			@if ($errors->has('direccion'))
	            <span class="help-block">
	                <strong>{{ $errors->first('direccion') }}</strong>
	            </span>
	        @endif
	</div>
</div>
<div class="col-md-6 col-sm-6">
	<div class="form-group{{ $errors->has('carrera_id') ? ' has-error' : '' }}">
		{{ Form::label('carrera_id', 'Carreras') }}
		{{ Form::select('carrera_id', $carreras, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true']) }}
		@if ($errors->has('carrera_id'))
	        <span class="help-block">
	            <strong>{{ $errors->first('carrera_id') }}</strong>
	        </span>
	    @endif
	</div>
</div>
<div class="form-group">
		{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-success pull-right'])}}
</div>