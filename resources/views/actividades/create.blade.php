@extends('shared._Layout')

@section('titulo','agregar camion')

@section('styles_laravel')
{{--estilos personalizado de create--}}
@endsection

@section('contenido')

@include('shared.errores')

<h2>Agregar Actividad</h2>

{{ Form::open([ 'route' => 'Actividades.store', 'method' => 'POST','enctype'=>'multipart/form-data']) }}
{{--@include('pasteles.partials.fields')  --}}
<div class="form-horizontal">
<h4>Docente</h4>
<hr/>
{{--para la idactividad--}} 
<div class="form-group">
{{  Form::label('ncontrol', 'CLAVE', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
        {{ Form::text('idactividad',0,['required' => 'required','placeholder'=>'123...',
            'class'=>'form-control','title'=>'clave:123...','pattern'=>'^[0-9]{1,}$','autocomplete'=>'off']) }}
    </div>
    
</div>
{{--para el nombre--}} 
<div class="form-group">
{{  Form::label('nombre', 'NOMBRE', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
            {{ Form::text('nombre','',['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
    </div>
</div>
{{--para el tipo--}} 
<div class="form-group">
{{  Form::label('tipo', 'TIPO', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
        {{Form::select('tipo',$tipos, '',['class'=>'form-control'])}}
    </div>
</div>
{{--para los creditos--}} 
<div class="form-group">
{{  Form::label('creditos', 'CREDITOS', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
            {{ Form::number('creditos','',['required' => 'required','class'=>'form-control','autocomplete'=>'off',
            'min'=>"1",'max'=>"5"])}}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
    </div>
</div>
{!! Form::close() !!}


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