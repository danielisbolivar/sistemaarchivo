@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> Gaveta </div>

                <div class="panel-body">
                    {!!Form::model($gaveta, ['route' => ['gavetas.update', $gaveta->id], 'method' => 'PUT']) !!}
                        
                        @include('gavetas.partials.form')
                    
                    {!!Form::close()!!}
                </div>
                 <div class="panel panel-footer col-md-12">
                     <a href="{{route('gavetas.index')}}" class="btn-sm btn-primary pull-right">
                            Volver
                        </a>
                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection