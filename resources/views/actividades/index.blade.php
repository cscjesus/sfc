@extends('shared._Layout')

@section('titulo','Actividades')

@section('styles_laravel')
{{--estilos personalizado de create--}}
@endsection

@section('contenido')

@include('shared.errores')

<h2>Lista Actividades</h2>
<a href="{{route('Actividades.create')}}" class="btn btn-success">Agregar</a>
    <hr/>
    <table class="table" id="MyTable">
        <thead>
          <tr>
            <th>CLAVE</th>
            <th>NOMBRE</th>
            <th>TIPO</th>
            <th>CREDITOS</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($actividades as $actividad)
          <tr>
            <td>{{$actividad->idactividad}}</td>
            <td>{{$actividad->nombre}}</td>
            <td>{{$actividad->tipo}}</td>
            <td>{{$actividad->creditos}}</td>
            <td>
            {{ Form::open([ 'route' => ['Actividades.destroy',$actividad->idactividad], 'method' => "DELETE"]) }}
              <a href="{{route('Actividades.edit',[$actividad->idactividad])}}" class="btn btn-success btn-xs">Editar</a> |
              <button type="submit" class="btn btn-danger btn-xs">Eliminar</button>
            {{Form::close()}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection

@section('my_scripts')
   
@endsection