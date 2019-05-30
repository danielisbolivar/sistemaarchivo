@extends('layouts.app')

@section('content')
<div class="content-header">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Expediente
                    @can('expedientes.create')
                        <a href="{{route('expedientes.create')}}" class="btn-sm btn-primary pull-right">
                            Registrar
                        </a>
                    @endcan()
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="panel-heading">
                            <h3>
                              Buscar Expediente:
                              {{ Form::open(['route' => 'expedientes.search', 'method' => 'POST', 'class' => 'form-inline pull-right']) }}
                              <div class="col-md-2 col-xs-2">
                                <div class="form-group">
                                  {{ Form::text('fecha_ingreso', null, ['class' => 'form-control', 'placeholder' => 'Fecha de Ingreso'])}}
                                </div>
                              </div>
                               <div class="col-md-2 col-md-offset-1 col-xs-2 col-xs-offset-1">
                                 <div class="form-group">
                                  {{ Form::text('ci', null, ['class' => 'form-control', 'placeholder' => 'Cédula'])}}
                                </div>
                              </div>
                              <div class="col-md-2 col-md-offset-1 col-xs-2 col-xs-offset-1">
                                 <div class="form-group">
                                  {{ Form::text('status', null, ['class' => 'form-control', 'placeholder' => 'Status'])}}
                                </div>
                              </div>
                              <div class="col-md-2 col-md-offset-1 col-xs-2 col-xs-offset-1">
                                 <div class="form-group">
                                  {{ Form::text('carrera', null, ['class' => 'form-control', 'placeholder' => 'Carrera'])}}
                                </div>
                              </div>
                              <div class="col-md-1 col-xs-1">
                                <div class="form-group">
                                  <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                  </button>
                                </div>
                              </div>
                              {{ Form::close() }}
                            </h3>
                          </div>
                        </div>
                      </div>
                    </div>
                 </div>  
                <div class="panel-body">
                   <table class="table table-striped table-hover">
                       <thead>
                           <tr>
                               
                               <th width="30px">Fecha de ingreso</th>
                               <th width="10px">Cedula</th>
                               <th>Status</th>
                               <th>Carrera</th>
                               <th colspan="3"></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($expedientes as $expediente)
                            <tr>
                               
                                <td width="30px">{{ $expediente->fecha_ingreso}}</td>
                                <td width="10px">{{ $expediente->estudiante->ci}}</td>
                                <td>{{ $expediente->status }}</td>
                                <td>{{ $expediente->estudiante->carrera->nombre}} ({{ $expediente->estudiante->carrera->localizacion}})</td>
                                <td width="10px">
                                    @can('expedientes.show')
                                        <a href="{{route('expedientes.show', $expediente->id) }}" class="btn btn-sm btn-default">Ver</a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('expedientes.edit')
                                        <a href="{{route('expedientes.edit', $expediente->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                    @endcan
                                </td>
                            </tr>
                           @endforeach()
                       </tbody>
                   </table>
                    
                   {{$expedientes->render()}}
                </div>
           
        </div>
    </div>
</div>
</div>
@endsection
