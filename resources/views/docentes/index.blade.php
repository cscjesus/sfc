@extends('shared._Layout')

@section('titulo','Docentes')

@section('styles_laravel')
{{--estilos personalizado de create--}}
@endsection

@section('contenido')

@include('shared.errores')

<h2>Lista Docentes</h2>
<a href="{{route('Docentes.create')}}" class="btn btn-success">Agregar</a>
  <hr/>
  <table class="table" id="MyTable">
    <thead>
      <tr>
        <th>CLAVE</th>
        <th>NOMBRE</th>
        {{-- <th>AP. PAT.</th>
        <th>AP. MAT</th> --}}
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($docentes as $docente)
      <tr>
        <td>{{$docente->iddocente}}</td>
        <td>{{$docente->nombre_completo}}</td>
        {{-- <td>{{$docente->nombre}}</td> --}}
        {{-- <td>{{$docente->ap_pat}}</td>
        <td>{{$docente->ap_mat}}</td> --}}
        <td>
        {{ Form::open([ 'route' => ['Docentes.destroy',$docente->iddocente], 'method' => "DELETE"]) }}
          <a href="{{route('Docentes.edit',[$docente->iddocente])}}" class="btn btn-success btn-xs">Editar</a> |
          <button type="submit" class="btn btn-danger btn-xs">Eliminar</button>
        {{Form::close()}}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection

@section('my_scripts')
<script>
    //agregar filtros y demas cosas a la tabla
   $('#MyTable').DataTable({ "language":
       { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" } });
    </script>
@endsection
