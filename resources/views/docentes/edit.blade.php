@extends('shared._Layout')

@section('titulo','agregar camion')

@section('styles_laravel')
{{--estilos personalizado de create--}}
@endsection

@section('contenido')

@include('shared.errores')

<h2>Actualizar</h2>
{{ Form::model($docente,[ 'route' => ['Docentes.update',$docente,$docente->iddocente], 'method' => 'PUT','enctype'=>'multipart/form-data']) }}
    @include('shared.controlesDocente')
{!! Form::close() !!}

<div>
    <a href="{{route('Docentes.index')}}" class="btn btn-info">
        Regresar</a>
</div>

@endsection

@section('my_scripts')

@endsection
