@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> Usuario </div>

                <div class="panel-body">
                   <!-- Button trigger modal -->
                   @can('users.reset')
                       <div class="col-md-12">
                    <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">
                      Cambiar Contraseña
                  </button></div>
                   @endcan
                   
                   

                  <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <form class="form-horizontal" method="POST" action="{{ route('users.reset',$user) }}">
                            {{ csrf_field()}}
                            <div class="modal-body">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>           
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
        {!!Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
                                    @if ($errors->has('password'))
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="alert alert-success">
                                                        <span class="help-block">
                                                            <strong style="color:white;">{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

        @include('users.partials.form')

        {!!Form::close()!!}
    </div>






    <div class="panel panel-footer col-md-12">
       <a href="{{route('users.index')}}" class="btn-sm btn-primary pull-right">
        Volver
    </a>
</div>
</div>
</div>
</div>
@endsection