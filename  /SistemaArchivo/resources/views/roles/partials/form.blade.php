<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		{{ Form::label('name', 'Nombre del Rol')}}
		{{ Form::text('name', null, ['class'=> 'form-control', 'required', 'id' => 'Text1', 'onkeyup' => 'fAgrega()'])}}
		@if ($errors->has('name'))
		    <span class="help-block">
		        <strong>{{ $errors->first('name') }}</strong>
		    </span>
		@endif

</div>
<div class="form-group">
		{{ Form::label('slug', 'URL')}}
		{{ Form::text('slug', null, ['class'=> 'form-control', 'required', 'id' => 'Text2'])}}
		

</div>
<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
		{{ Form::label('description', 'Descripción')}}
		{{ Form::textarea('description', null, ['class'=> 'form-control'])}}
		@if ($errors->has('description'))
		    <span class="help-block">
		        <strong>{{ $errors->first('description') }}</strong>
		    </span>
		@endif

</div>
<hr>
<h3>Permiso Especial</h3>
<div class="form-group">
	<label>{{ Form::radio('special','all-access')}}Acceso Total</label>
	<label>{{ Form::radio('special','no-access')}}Sin acceso</label>
</div>
<hr>
<h3>Lista de Permisos</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach ($permissions as $permission)
			<li>
				<label>
					{{ Form::checkbox('permissions[]', $permission->id, null) }}
					{{ $permission->name }}
					<em>({{ $permission->description ?: 'Sin Descripción' }})</em>
				</label>
			</li>
		@endforeach
	</ul>
</div>
<div class="form-group">
		{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-success'])}}
</div>
