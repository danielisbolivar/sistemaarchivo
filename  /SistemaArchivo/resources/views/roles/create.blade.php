@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> Crear Rol </div>

                <div class="panel-body">
                    {!!Form::open(['route' => 'roles.store'])!!}
                        
                        @include('roles.partials.form')
                    
                    {!!Form::close() !!}
                </div>
                <div class="panel panel-footer col-md-12">
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