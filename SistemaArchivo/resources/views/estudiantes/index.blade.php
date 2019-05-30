@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Estudiantes
                    @can('estudiantes.create')
                        <a href="{{route('estudiantes.create')}}" class="btn-sm btn-primary pull-right">
                            Registrar
                        </a>
                    @endcan()
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover">
                       <thead>
                           <tr>
                               <th width="30px">Cédula</th>
                               <th>Nombre y Apellido</th>
                               <th>Carrera</th>
                               <th colspan="3"></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($estudiantes as $estudiante)
                            <tr>
                                <td width="30px">{{ $estudiante->nacionalidad.$estudiante->ci}}</td>
                                <td>{{ $estudiante->nombre.' '.$estudiante->apellido }}</td>
                                <td>{{ $estudiante->carrera->nombre}} ({{ $estudiante->carrera->localizacion}})</td>
                                <td width="10px">
                                    @can('estudiantes.show')
                                        <a href="{{route('estudiantes.show', $estudiante->id) }}" class="btn btn-sm btn-default">Ver</a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('estudiantes.edit')
                                        <a href="{{route('estudiantes.edit', $estudiante->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                    @endcan
                                </td>
                            </tr>
                           @endforeach()
                       </tbody>
                   </table>
                    
                   {{$estudiantes->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
