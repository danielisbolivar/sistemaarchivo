<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>{{ config('app.name', 'Laravel') }}</title>
   <link rel="icon" type="image/png" href="{{ asset('img/index.png') }}" />
   <!-- Styles -->
   <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
   <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/oinicons/css/ionicons.min.css')}}">
 
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.css')}}">
 
  <link rel="stylesheet" href="{{ asset('css/bootstrap3-wysihtml5.min.css')}}">
  <link href="{{ asset('css/bootstrap-select.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini"><b>D</b>U</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Dace</b>UNERG</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-sign-out"></i>
            </button>
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        @guest
            <li><a href="{{ url('/') }}">Inicio</a></li>
                           
                @else
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                
                               
                            Salir
                             <i class="fa fa-sign-out"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endguest
        </ul>
      </div>
     
    </nav>
  </header>
  @auth
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('img/logo.png') }}" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header text-center">ARCHIVO & EXPEDIENTES</li>
        <!--Home-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>Inicio</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/home') }}"><i class="fa fa-circle-o"></i>Inicio</a></li>
          </ul>
        </li>
         <!--End Home-->
          <!--Expediente-->
        @can('expedientes.index')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder-open"></i> <span>Expediente</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('expedientes.index') }}"><i class="fa fa-table"></i>Buscar</a></li>
            <li><a href="{{ route('expedientes.create') }}">
              @can('expedientes.create')
                  <i class="fa fa-location-arrow"></i>Agregar</a>
              @endcan
            </li>
          </ul>
        </li>
        @endcan
         <!--End Expediente-->
         <!--Role-->
        @can('roles.index')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i>
                <span>Roles</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
            
              <ul class="treeview-menu">
                <li><a href="{{route('roles.index')}}"><i class="fa fa-eye"></i>Ver</a></li>
                <li>
                     @can('roles.create')
                        <a href="{{route('roles.create')}}"><i class="fa fa-location-arrow"></i>Registrar</a>
                     @endcan
                 </li>
              </ul>
            </li>
        @endcan
         <!--End Role-->
          <!--Archivos-->
        @can('archivos.index')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-archive"></i> <span>Archivos</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('archivos.index')}}"><i class="fa fa-eye"></i>Ver</a></li>
                <li>
                    @can('archivos.create')
                        <a href="{{route('archivos.create')}}"><i class="fa fa-location-arrow"></i>Agregar</a>
                    @endcan
                </li>
              </ul>
            </li>
        @endcan
         <!--End Archivos-->
         <!--Gavetas-->
        @can('gavetas.index')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th-large"></i> <span>Gavetas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('gavetas.index')}}"><i class="fa fa-eye"></i>Ver</a></li>
                <li>
                    @can('gavetas.create')
                        <a href="{{route('gavetas.create')}}"><i class="fa fa-location-arrow"></i>Agregar</a></li>
                    @endcan
              </ul>
            </li>
        @endcan
         <!--End Gavetas-->
          <!--Estudiantes-->
        @can('gavetas.index')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-graduation-cap"></i> <span>Estudiantes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('estudiantes.index')}}"><i class="fa fa-eye"></i>Ver</a></li>
                <li>
                    @can('estudiantes.create')
                        <a href="{{route('estudiantes.create')}}"><i class="fa fa-address-book"></i>Registrar</a>
                    @endcan
                </li>
              </ul>
            </li>
        @endcan
         <!--End Estudiantes-->
          <!--Carreras-->
        @can('carreras.index')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Carreras</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('carreras.index')}}"><i class="fa fa-eye"></i>Ver</a></li>
                    @can('carreras.create')
                        <li><a href="{{route('carreras.create')}}"><i class="fa fa-location-arrow"></i>Registrar</a></li>
                    @endcan
              </ul>
            </li>
        @endcan
         <!--End Carreras-->
          <!--Users-->
        @can('users.index')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Usuarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('users.index')}}"><i class="fa fa-eye"></i>Ver</a></li>
                <li>
                    @can('register')
                        <a href="{{route('users.create')}}"><i class="fa fa-address-card"></i>Registrar</a>
                    @endcan
                </li>
              </ul>
            </li>
        @endcan
         <!--End Users-->

          <!--Reportes-->
        @can('users.index')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('reportes')}}"><i class="fa fa-eye"></i>Ver</a></li>
              </ul>
            </li>
        @endcan
         <!--End Users-->
          
        <li class="treeview">
               <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i>
                <span>Salir</span>
                
              </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
         
       
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  @endauth

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content">
     @if (session('info'))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-success">
                            {{ session('info') }}                
                        </div>
                    </div>
                </div>
            </div>
        @endif
   
        @yield('content')
   
    
    </div>
   </div>
        
         
</div>

<!-- Scripts -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
     @stack('scripts')

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('js/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
</body>
</html>
