@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Gaveta
                    @can('gavetas.create')
                        <a href="{{route('gavetas.create')}}" class="btn-sm btn-primary pull-right">
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
                           @foreach($gavetas as $gaveta)
                            <tr>
                                <td>{{ $gaveta->nombre }}</td>
                                <td>
                                    @can('gavetas.show')
                                        <a href="{{route('gavetas.show', $gaveta->id) }}" class="btn btn-sm btn-default">Ver</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('gavetas.edit')
                                        <a href="{{route('gavetas.edit', $gaveta->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                    @endcan
                                </td>
                                 <td>
                                    @can('gavetas.destroy')
                                      {!! Form::open(['route' => ['gavetas.destroy', $gaveta->id], 'method' => 'DELETE']) !!}
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
                    
                   {{$gavetas->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
