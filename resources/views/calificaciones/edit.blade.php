@extends('shared._Layout')

@section('titulo','agregar camion')

@section('styles_laravel')
{{--estilos personalizado de create--}}
@endsection

@section('contenido')

@include('shared.errores')


<h2>Actualizar</h2>
{{ Form::open([ 'route' => ['Calificaciones.update',$calificacion,$calificacion->idcalificacion], 'method' => 'PUT']) }}
{{--@include('pasteles.partials.fields')  --}}
<div class="form-horizontal">
<h4>Calificacion</h4>
<hr/>
{{--para la iddocente--}} 
<div class="form-group">
{{  Form::label('idcalificacion', 'GRUPO', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
        {{ Form::text('idcalificacion',$calificacion->idcalificacion,['readonly' => '','class'=>'form-control']) }}
    </div>
    
</div>
{{--para el nombre--}} 
<div class="form-group">
{{  Form::label('ncontrol', 'NCONTROL', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
            {{ Form::text('ncontrol',$calificacion->ncontrol,['readonly' => '','class'=>'form-control','autocomplete'=>'off'])}}
    </div>
</div>
{{--para el ap_pat--}} 
<div class="form-group">
{{  Form::label('nombre', 'NOMBRE', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
            {{ Form::text('nombre',$calificacion->alumno->nombre,['required' => 'required','class'=>'form-control','autocomplete'=>'off',
            'readonly'=>'readonly'])}}
    </div>
</div>
{{--para el ap_mat--}} 
<div class="form-group">
{{  Form::label('calificacion', 'CALIFICACION', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
            {{ Form::select('calificacion',$calificaciones,$calificacion->calificacion,['required' => 'required','class'=>'form-control','autocomplete'=>'off',
            "id"=>"calificacion"])}}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
    </div>
</div>
{!! Form::close() !!}
    
<div>
  <a href="{{route('Calificaciones.index').'/'.
  $calificacion->grupo->periodo.'/'.$calificacion->idgrupo
  }} " class="btn btn-info">
      Regresar</a>
</div>
    
@endsection

@section('my_scripts')
   
@endsection