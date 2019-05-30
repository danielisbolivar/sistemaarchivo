@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Usuarios
                    @can('users.create')
                         <a href="{{ route('users.create') }}" class="btn btn-sm btn-success pull-right">Registro</a>
                    @endcan()
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover">
                       <thead>
                           <tr>
                               <th width="10px">id</th>
                               <th>Nombre</th>
                               <th>Correo</th>
                               <th colspan="3">
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($users as $user)
                            <tr>
                                <td width="10px">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                 <td width="10px">
                                    @can('users.edit')
                                         <a href="{{route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                    @endcan
                                </td>
                            </tr>
                           
                           @endforeach()
                       </tbody>
                   </table>
                    
                   {{$users->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
