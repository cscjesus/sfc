@extends('shared._Layout')

@section('titulo','agregar camion')

@section('styles_laravel')
{{--estilos personalizado de create--}}
@endsection

@section('contenido')

@include('shared.errores')

<h2>Agregar</h2>

{{ Form::model($actividad,[ 'route' => ['Actividades.store',$actividad], 'method' => 'POST','enctype'=>'multipart/form-data']) }}
    @include('shared.controlesActividad')
{{ Form::close() }}

<div>
    <a href="{{route('Actividades.index')}}" class="btn btn-info">
        Regresar</a>
</div>
@endsection

@section('my_scripts')
   <script>
   $(document).ready(function(){
     $("#btnGuardar").click(function(){
       if($("#tipo").val()=="seleccione")
       {
         swal("Seleccion el tipo de la actividad");
         return false;
       }
     });
   });
   </script>
@endsection
