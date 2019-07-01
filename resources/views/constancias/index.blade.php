@extends('shared._Layout')

@section('titulo','Constancias')

@section('styles_laravel')
{{--estilos personalizado de create--}}

@endsection

@section('contenido')

@include('shared.errores')

<h2>Generar constancias</h2>
<hr/>

@if(!empty($calificaciones))
<table class="table" id="MyTable">
<thead>
 <tr>
   <th>ID</th>
   <th>NCONTROL</th>
   <th>NOMBRE</th>
   <th>CALIFICACION</th>
   <th>GRUPO</th>
   <th></th>
 </tr>
</thead>
<tbody>
 @foreach ($calificaciones as $calificacion)
 <tr>
    <td>{{$calificacion->idcalificacion}}</td>
    <td>{{$calificacion->ncontrol}}</td>
    <td>{{$calificacion->alumno->nombre." ".$calificacion->alumno->ap_pat." ".$calificacion->alumno->ap_mat}}</td>
    <td>{{$calificacion->calificacion}}</td>
    <td>{{$calificacion->idgrupo}} </td>

    <input type="hidden" id="docenteNombre" value="{{
      $calificacion->grupo->docente->nombre ." ".$calificacion->grupo->docente->ap_pat." ".
      $calificacion->grupo->docente->ap_mat.' - '.$calificacion->grupo->idcarrera
    }}"/>

    <td>
    <a href="{{route('Constancias.show',[$calificacion->idcalificacion])}}" 
      class="btn btn-success btn-xs" target="_blank">Generar</a>   
   </td>
 </tr>
 @endforeach
</tbody>
</table>
@endif

@endsection

@section('my_scripts')
<script>
  //agregar filtros y demas cosas a la tabla
 $('#MyTable').DataTable({ "language": 
     { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" } });
  </script>
@endsection