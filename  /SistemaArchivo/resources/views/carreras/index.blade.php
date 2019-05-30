@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Carreras
                    @can('carreras.create')
                        <a href="{{route('carreras.create')}}" class="btn-sm btn-primary pull-right">
                            Registrar
                        </a>
                    @endcan()
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover">
                       <thead>
                           <tr>
                               <th width="10px">Código</th>
                               <th>Nombre</th>
                               <th>Localización</th>
                               <th colspan="2"></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($carreras as $carrera)
                            <tr>
                                <td width="10px">{{ $carrera->codigo }}</td>
                                <td>{{ $carrera->nombre }}</td>
                                <td>{{ $carrera->localizacion }}</td>
                                <td width="10px">
                                    @can('carreras.edit')
                                        <a href="{{route('carreras.edit', $carrera->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                    @endcan
                                </td>
                            </tr>
                           @endforeach()
                       </tbody>
                   </table>
                    
                   {{$carreras->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
