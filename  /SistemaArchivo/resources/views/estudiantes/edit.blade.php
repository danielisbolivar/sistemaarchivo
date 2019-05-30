@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> Estudiante </div>

                <div class="panel-body">
                    {!!Form::model($estudiante, ['route' => ['estudiantes.update', $estudiante->id], 'method' => 'PUT']) !!}
                        
                        @include('estudiantes.partials.form')
                    
                    {!!Form::close()!!}
                </div>
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
  $(document).ready(function() {      
        window.onload = function() {
            document.querySelector("#retirado").style.display = 'none';
        }
        document.querySelector("#si").addEventListener('click',function(e) {
            var oculto = document.querySelector("#retirado");
            if (oculto.style.display=='block') {
                oculto.style.display='none';

            }else {
                oculto.style.display='block';
            $('#ingreso').prop("disabled", false);
            }if(oculto.style.display='block'){
                oculto = document.querySelector("#prestado");
                oculto.style.display='none';
            }
            
        });

     });  
       
</script>
<script>
  $(document).ready(function() {      
        window.onload = function() {
            document.querySelector("#prestado").style.display = 'none';
        }
        document.querySelector("#no").addEventListener('click',function(e) {
            var oculto = document.querySelector("#prestado");
            if (oculto.style.display=='block') {
                oculto.style.display='none';
            }else {
                oculto.style.display='block';
              $('#ingreso').prop("disabled", false);
            }if(oculto.style.display='block'){
                oculto = document.querySelector("#retirado");
                oculto.style.display='none';
            }
        });

     });  
       
</script>
<script>
$('.selectpicker').selectpicker({
  style: 'btn-info',
  size: 4
});
</script>
@endpush
@endsection