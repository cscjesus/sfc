@extends('shared._Layout')

@section('titulo','Alumnos')

@section('styles_laravel')
{{--estilos personalizado de create--}}

@endsection

@section('contenido')

@include('shared.errores')

  <h2>Lista de Grupos</h2>
  <a href="{{route('Grupos.create')}}" class="btn btn-success">Agregar</a>
  <hr/>
  <table class="table" id="MyTable">
    <thead>
      <tr>
        <th>GRUPO</th>
        <th>PERIODO</th>
        <th>SEMESTRE</th>
        <th>DOCENTE</th>
        <th>ACTIVIDAD</th>
        <th>CARRERA</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
@foreach ($grupos as $grupo)
      <tr>
        <td>{{$grupo->idgrupo}}</td>
        <td>{{$grupo->periodo}}</td>
        <td>{{$grupo->semestre}}</td>
        {{-- <td>{{$grupo->docente->nombre.' '.$grupo->docente->ap_pat.' '.$grupo->docente->ap_mat}}</td> --}}
        <td>{{$grupo->docente->nombre_completo}}</td>
        <td>{{$grupo->actividad->nombre}} </td>
        <td>{{$grupo->idcarrera}} </td>
        <td>
          {{ Form::open([ 'route' => ['Grupos.destroy',$grupo->idgrupo], 'method' => "DELETE"]) }}
            <!-- a href="{{route('Grupos.edit',[$grupo->idgrupo])}}" class="btn btn-success btn-xs">Editar</a--> |
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
