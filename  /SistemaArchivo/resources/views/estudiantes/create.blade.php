@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> Estudiante </div>

                <div class="panel-body">
                    {!!Form::open(['route' => 'estudiantes.store'])!!}
                        
                        @include('estudiantes.partials.form')
                    
                    {!!Form::close() !!}
                </div>
                <div class="panel panel-footer col-md-12">
                    <a href="{{route('estudiantes.index')}}" class="btn-sm btn-primary pull-right">
                            Volver
                        </a>
                </div>
        </div>
    </div>
</div>
@push('scripts')

<script>
$('.selectpicker').selectpicker({
  style: 'btn-info',
  size: 4
});
</script>
@endpush

@endsection