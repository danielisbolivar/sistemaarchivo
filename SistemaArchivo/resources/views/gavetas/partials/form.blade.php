<div class="form-group"{{ $errors->has('nombre') ? ' has-error' : '' }}>
		{{ Form::label('nombre', 'Nombre de la Gaveta')}}
		{!! Form::textarea('nombre',null,['class'=>'form-control', 'required',  'rows' => 2, 'cols' => 40]) !!}
		@if ($errors->has('nombre'))
		    <span class="help-block">
		        <strong>{{ $errors->first('nombre') }}</strong>
		    </span>
		@endif
</div>
<div class="form-group">
		{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-success'])}}
</div>
