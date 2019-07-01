@extends('shared._Layout')

@section('titulo','Alumnos')

@section('styles_laravel')
{{--estilos personalizado de create--}}

@endsection

@section('contenido')

@include('shared.errores')

  <h2>Lista de Estudiantes</h2>
  <a href="{{route('Alumnos.create')}}" class="btn btn-success">Agregar</a>
  <hr/> 
  <table class="table" id="MyTable">
    <thead>
      <tr>
        <th>NCONTROL</th>
        <th>NOMBRE</th>
        <th>AP. PAT.</th>
        <th>AP. MAT</th>
        <th>MODALIDAD</th>
        <th>CARRERA</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($alumnos as $alumno)
      <tr>
        <td>{{$alumno->ncontrol}}</td>
        <td>{{$alumno->nombre}}</td>
        <td>{{$alumno->ap_pat}}</td>
        <td>{{$alumno->ap_mat}}</td>
        <td>{{$alumno->modalidad->nombre}} </td>
        <td>{{$alumno->idcarrera}} </td>
        <td>
        {{ Form::open([ 'route' => ['Alumnos.destroy',$alumno->ncontrol], 'method' => "DELETE"]) }}
          <a href="{{route('Alumnos.edit',[$alumno->ncontrol])}}" class="btn btn-success btn-xs">Editar</a> |
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