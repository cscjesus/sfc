@extends('shared._Layout')

@section('titulo','Agregar docente')

@section('styles_laravel')
{{--estilos personalizado de create--}}
@endsection

@section('contenido')

@include('shared.errores')

<h2>Agregar</h2>
{{-- verificar si es un postback--}}
@if (empty($docente)){{--Si el docente esta vacion, entonces no es postback--}}
{{ Form::open([ 'route' => 'Docentes.store', 'method' => 'POST','enctype'=>'multipart/form-data']) }}
{{--@include('pasteles.partials.fields')  --}}
<div class="form-horizontal">
<h4>Docente</h4>
<hr/>
{{--para la iddocente--}} 
<div class="form-group">
{{  Form::label('ncontrol', 'CLAVE', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
        {{ Form::text('iddocente','',['required' => 'required','placeholder'=>'123...',
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
{{--para el ap_pat--}} 
<div class="form-group">
{{  Form::label('ap_pat', 'AP. PAT.', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
            {{ Form::text('ap_pat','',['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
    </div>
</div>
{{--para el ap_mat--}} 
<div class="form-group">
{{  Form::label('ap_mat', 'AP. MAT.', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
            {{ Form::text('ap_mat','',['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
    </div>
</div>
{!! Form::close() !!}
@else {{--ya hay un objeto --}}
{{ Form::open([ 'route' => 'Docentes.store', 'method' => 'POST','enctype'=>'multipart/form-data']) }}
{{--@include('pasteles.partials.fields')  --}}
<div class="form-horizontal">
<h4>Docente</h4>
<hr/>
{{--para la iddocente--}} 
<div class="form-group">
{{  Form::label('ncontrol', 'CLAVE', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
        {{ Form::text('iddocente',$docente->iddocente,['required' => 'required','placeholder'=>'123...',
            'class'=>'form-control','title'=>'clave:123...','pattern'=>'^[0-9]{1,}$','autocomplete'=>'off']) }}
    </div>
    
</div>
{{--para el nombre--}} 
<div class="form-group">
{{  Form::label('nombre', 'NOMBRE', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
            {{ Form::text('nombre',$docente->nombre,['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
    </div>
</div>
{{--para el ap_pat--}} 
<div class="form-group">
{{  Form::label('ap_pat', 'AP. PAT.', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
            {{ Form::text('ap_pat',$docente->ap_pat,['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
    </div>
</div>
{{--para el ap_mat--}} 
<div class="form-group">
{{  Form::label('ap_mat', 'AP. MAT.', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
            {{ Form::text('ap_mat',$docente->ap_mat,['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
    </div>
</div>
{!! Form::close() !!}
@endif
  
    


  <div>
      <a href="{{route('Docentes.index')}}" class="btn btn-info">
          Regresar</a>
  </div>


  <!-- empieza prueba-->
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-8">
                
            </div>
            <div class="col-md-4">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- termina prueba-->



@endsection

@section('my_scripts')
  <script>
   var mensaje ='{{$mensajes}}';
          if(mensaje !='')
            swal('¡Atención!',mensaje,'warning');
   </script>
@endsection