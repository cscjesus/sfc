@extends('shared._Layout')

@section('titulo','Editar Estudiante')

@section('styles_laravel')
{{--estilos personalizado de create--}}
@endsection

@section('contenido')
{{--vista que despliega errores--}}
@include('shared.errores')

<h2>Editar</h2>

{{ Form::model($alumno,[ 'route' => ['Alumnos.update',$alumno,$alumno->ncontrol], 'method' => 'PUT']) }}
    @include('shared.controlesAlumnos')
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
        </div>
    </div>
{!! Form::close() !!}


<div>
    <a href="{{route('Alumnos.index')}}" class="btn btn-info">
        Regresar</a>
</div>
@endsection

@section('my_scripts')
<script>
  $(document).ready(
    function(){
     /* var mensaje ='{{--$mensajes--}}';
          if(mensaje !='')
            swal('¡Atención!',mensaje,'warning');*/
      $("#btnGuardar").click(function(){
        if($('#idcarrera').val()=="SELEC")
        {
          swal("seleccione una carrera");
          return false;
        }
      });
    });
  </script>
@endsection
