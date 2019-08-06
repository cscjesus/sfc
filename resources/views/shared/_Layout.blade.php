<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@section('titulo') @show()</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    {{-- todo lo que tiene datatables es necesario para trabajar con ese plugin --}}
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- todo lo necesario para trabajar con datetimepicker --}}
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
    </script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />
    {{--para trabajar con archivos de excel--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/jszip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
    @section('styles_laravel')
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    @show
    <style>
        /* footer{
      text-align: center;

      background-color: #f8f8f8; */
        /* background-color: beige; */
        /* bottom: 0px;
      height: 70px;
    } */
        .body-content {
            padding-left: 15px;
            padding-right: 15px;
        }

        .dl-horizontal dt {
            white-space: normal;
        }

        input,
        select,
        textarea {
            max-width: 280px;
        }

        input,
        select {
            text-transform: uppercase;
        }
    </style>
    @yield('my_styles')
</head>

<body>
    {{--  @include('partials.layout.navbar')
    @include('partials.layout.errors') --}}

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="/sgc/public" class="navbar-brand">.:SGC:.</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">

                    <li><a href="/sgc/public">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Catalogos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('Alumnos.index')}}">Estudiantes</a></li>
                            <li><a href="{{route('Alumnos.create')}}">Alta Estudiante</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('Docentes.index')}}">Docentes</a></li>
                            <li><a href="{{route('Docentes.create')}}">Alta Docente</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('Actividades.index')}}">Actividades</a></li>
                            <li><a href="">Alta Actividad</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('Grupos.index')}}">Grupos</a></li>
                            <li><a href="{{route('Grupos.create')}}">Alta Grupo</a></li>
                            <!--li><a href="{{-- route('CatCamiones.create')--}}">Alta Camion</a></li-->
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Calificaciones<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('Calificaciones.index')}}">Calificaciones</a></li>
                            <!--li><a href="{{-- route('Viajes.create') --}}">Alta Viaje</a></li-->
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('Constancias.index')}}">Constancias</a></li>
                        </ul>
                    </li>
                    <li><a href="about">About</a></li>
                    <!--li><a href="/contact">Contact</a></li-->
                </ul>
            </div>
        </div>
    </div>

    <div class="container body-content" style="margin-top: 80px">
        @yield('contenido')

        <hr>
        <footer>
            {{-- <p>&copy; {{ date('Y-m-d H:i:s')}} - My ASP.NET Application</p> --}}
            <p>&copy; {{ date('Y')}} - .:SGC:. Sistema Gestor de Constancias</p>
        </footer>

    </div>
    <!-- Scripts
    <script>
        $(document).ready(function(){
            $('#MyTable').dataTable();
        });
    </script>

<hr>
<footer>
{{-- <p>&copy; {{ date('Y-m-d H:i:s')}} - My ASP.NET Application</p> --}}
<p>&copy; {{ date('Y')}} - My PHP Application</p>
</footer>-->
    @yield('my_scripts')
</body>

</html>
<!--resolver problema de la clase Form
    https://stackoverflow.com/questions/44395822/error-class-html-not-found-laravel-5-4

    composer require laravelcollective/html 5.3
ejemplo seguido
https://richos.gitbooks.io/laravel-5/content/anexos/crud.html
o ir directamente a laravel collective
https://laravelcollective.com/docs/master/html

otro ejemplo
https://styde.net/componentes-dinamicos-para-formularios-con-blade-y-laravel/
-->
