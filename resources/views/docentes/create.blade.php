@extends('shared._Layout')

@section('titulo','Agregar docente')

@section('styles_laravel')
{{--estilos personalizado de create--}}
@endsection

@section('contenido')

@include('shared.errores')

<h2>Agregar</h2>

{{ Form::model($docente,[ 'route' => ['Docentes.store',$docente], 'method' => 'POTS','enctype'=>'multipart/form-data']) }}
    @include('shared.controlesDocente')
{!! Form::close() !!}

  <div>
      <a href="{{route('Docentes.index')}}" class="btn btn-info">
          Regresar</a>
  </div>

@endsection

@section('my_scripts')
  <script>
   var mensaje ='{{$mensajes}}';
          if(mensaje !='')
            swal('¡Atención!',mensaje,'warning');
   </script>
@endsection
