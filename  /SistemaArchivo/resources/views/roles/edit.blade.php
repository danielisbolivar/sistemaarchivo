@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> Rol </div>

                <div class="panel-body">
                    {!!Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}
                        
                <div class="form-group">
                        {{ Form::label('name', 'Nombre del Rol')}}
                        {{ Form::text('name', null, ['class'=> 'form-control', 'required', 'id' => 'Text1', 'onkeyup' => 'fAgrega()'])}}

                </div>
                <div class="form-group">
                        {{ Form::label('slug', 'URL')}}
                        {{ Form::text('slug', null, ['class'=> 'form-control', 'required', 'id' => 'Text2'])}}

                </div>
                <div class="form-group">
                        {{ Form::label('description', 'Descripción')}}
                        {{ Form::textarea('description', null, ['class'=> 'form-control'])}}

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
                    
                    {!!Form::close()!!}
                </div>
            </div>
            <div class="panel-footer">
                     <a href="{{route('roles.index')}}" class="btn-sm btn-primary pull-right">
                            Volver
                        </a>
            </div>
        </div>
    </div>
</div>
<script language="javascript">
function fAgrega()
{
document.getElementById("Text2").value = document.getElementById("Text1").value;
}
</script>
@endsection