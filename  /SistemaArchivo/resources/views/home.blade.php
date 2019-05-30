@extends('layouts.app')

@section('content')

  

  <section class="content-header">
        <h1>
          Tablero
          <small>Panel de Control</small>
        </h1>
        
      </section>

    
          
  

<div class="content-header" style="padding: 40px;">
    <div class="content">
        <div class="row">
            <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-1">
              <div class="container-fluid">
                @can('archivos.index')
                     <div class="col-md-12">
                  <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-xs-2 col-xs-offset-1"><a href="{{ route('archivos.index') }}"><img src="{{ asset('img/gabinetes.svg') }}" ></a><p class="text-center">Archivos</p></div>
                @endcan

                @can('gavetas.index')
                    <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-2 col-xs-2 col-xs-offset-1"><a href="{{ route('gavetas.index') }}"><img src="{{ asset('img/caja-abierta.svg') }}"></a><p class="text-center">Gavetas</p></div>
                @endcan
               
                 @can('expedientes.index')
                     <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-2 col-xs-2 col-xs-offset-1"><a href="{{ route('expedientes.index') }}"><img src="{{ asset('img/carpeta.svg') }}"></a><p class="text-center">Expediente</p></div></div>
                </div>
                 @endcan
                @can('users.index')
                    <div class="row">
                  <div class="col-md-12" style="padding-top: 40px;">
                    <div class="col-lg-2 col-lg-offset-2 col-md-2 col-md-offset-3 col-xs-2 col-xs-offset-1"><a href="{{ route('users.index') }}"><img src="{{ asset('img/usuarios.svg') }}" ></a><p class="text-center">Usuarios</p></div>
                @endcan
                
                @can('estudiantes.index')
                   <div class="col-lg-2 col-lg-offset-2 col-md-2 col-md-offset-3 col-xs-2 col-xs-offset-1"><a href="{{ route('estudiantes.index') }}"><img src="{{ asset('img/estudiar.svg') }}" ></a><p class="text-center">Estudiantes</p></div>
                @endcan
      
                    
                  </div>
                </div>
              </div>
            </div>
        </div>

    </div>
</div>
@endsection
