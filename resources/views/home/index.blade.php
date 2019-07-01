
@extends('shared._Layout')
{{--Colocar titulo--}}
@section('titulo','.:SGC:.')
@section('contenido') 
    {{-- <a class="btn btn-success pull-right" href="{{ url('/pasteles/create') }}" role="button">Nuevo pastel</a>
    @include('pasteles.partials.table') --}}
     <!-- Main jumbotron for a primary marketing message or call to action -->
     <div class="jumbotron">
            <div class="container">
              <h1>Php desde Laravel</h1>
              <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
              <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
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