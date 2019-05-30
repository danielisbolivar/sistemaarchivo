@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> Expediente </div>

                <div class="panel-body">
                    {!!Form::model($expediente, ['route' => ['expedientes.update', $expediente->id], 'method' => 'PUT']) !!}
                        
                        @include('expedientes.partials.form')
                    
                    {!!Form::close()!!}
                </div>
            </div>
            <div class="panel panel-footer col-md-12">
                     <a href="{{route('expedientes.index')}}" class="btn-sm btn-primary pull-right">
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