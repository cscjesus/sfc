
@extends('shared._Layout')
{{--Colocar titulo--}}
@section('titulo','.:SGC:.')
@section('contenido')
    {{-- <a class="btn btn-success pull-right" href="{{ url('/pasteles/create') }}" role="button">Nuevo pastel</a>
    @include('pasteles.partials.table') --}}
     <!-- Main jumbotron for a primary marketing message or call to action -->
     <div class="jumbotron">
        <div class="container">
          <h1>.:SGC:.</h1>
          <h2>Sistema de Gestion de Constancias</h2>
          <p>Sistema encargado de el manejo de estudiantes, docentes, actividades extraescolares, calificaciones y generacion de constancias.</p>
        </div>
      </div>

@endsection

{{--

  @extends('shared._Layout') //agregar una vista parcial llamada _Layout ubicada en shared

@section('titulo','agregar camion')//agregar titulo a la pagina

@section('styles_laravel')
//agregar estilos personalziados
@endsection

@section('contenido')//seccion de contenido

@include('shared.errores')//agregar una vista parcial

<h2>Acerca de</h2>
<h4>Camion</h4>

@endsection //termina seccion de contenido

@section('my_scripts')
   //agregar scripts de la pagina
@endsection

  --}}

  {{--
    @include is just like a basic PHP include, it includes a "partial" view into
    your view. @extends lets you "extend" a template, which defines its own
    sections etc.

    --}}
