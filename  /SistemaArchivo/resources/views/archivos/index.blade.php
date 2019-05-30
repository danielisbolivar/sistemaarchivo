@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Archivos
                    @can('archivos.create')
                        <a href="{{route('archivos.create')}}" class="btn-sm btn-primary pull-right">
                            Registrar
                        </a>
                    @endcan()
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover">
                       <thead>
                           <tr>
                               <th>Nombre</th>
                               <th colspan="3"></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($archivos as $archivo)
                            <tr>
                                
                                <td>{{ $archivo->nombre }}</td>
                                <td>
                                    @can('archivos.show')
                                        <a href="{{route('archivos.show', $archivo->id) }}" class="btn btn-sm btn-default">Ver</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('archivos.edit')
                                        <a href="{{route('archivos.edit', $archivo->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                    @endcan
                                </td>
                                 <td>
                                    @can('archivos.destroy')
                                      {!! Form::open(['route' => ['archivos.destroy', $archivo->id], 'method' => 'DELETE']) !!}
                                           <button class="btn btn-sm btn-danger">
                                            Eliminar
                                           </button>
                                      {!! Form::close()!!}
                                    @endcan
                                </td>
                            </tr>
                           @endforeach()
                       </tbody>
                   </table>
                    
                   {{$archivos->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
