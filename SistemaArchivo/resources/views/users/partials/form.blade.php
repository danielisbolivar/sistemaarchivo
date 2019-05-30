<div class="col-md-6">
	<div class="form-group">
		{{ Form::label('name', 'Nombre de usuario')}}
		{{ Form::text('name', null, ['class'=> 'form-control'])}}

	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		{{ Form::label('email', 'Correo del usuario')}}
		{{ Form::text('email', null, ['class'=> 'form-control'])}}

	</div>
</div>


<h3>Lista de Roles</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach ($roles as $role)
			<li>
				<label>
					{{ Form::checkbox('roles[]', $role->id, null) }}
					{{ $role->name }}
					<em>({{ $role->description ?: 'Sin Descripción' }})</em>
				</label>
			</li>
		@endforeach
	</ul>
</div>
<div class="form-group">
		{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-success'])}}
</div>