@extends('shared._Layout')

@section('titulo','Calificaciones')

@section('styles_laravel')
{{--estilos personalizado de create--}}
<style>
  @media print {
    a,button{
      display: none !important;
    }
  }
</style>
@endsection

@section('contenido')

@include('shared.errores')

<h2>Lista Calificaciones</h2>
  <!-- a href="{{--route('Calificaciones.create')--}}" class="btn btn-success" id="btnAgregar">Agregar</a-->
  <a class="btn btn-success" id="btnAgregar" href="">Agregar</a>
<hr/>

{{-- Form::open([ 'route' => 'Calificaciones.index', 'method' => 'GET','enctype'=>'multipart/form-data',
"id"=>"formulario"]) --}}
{{ Form::open(["method"=>"GET","id"=>"formulario"]) }}
{{--@include('pasteles.partials.fields')  --}}
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <select name="periodos" id="periodos" class="form-control"> </select>
    </div>
    <div class="col-md-3">
      <select name="grupos" id="grupos" class="form-control" onchange="this.form.submit()"></select>
    </div>
    <div class="col-md-3">
    <label id="lblDocente">
      {{$docente}}
    </label>
    </div>
    <div class="col-md-3">

    </div>
  </div>
</div>

{!! Form::close() !!}

<br/>
<br/>


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
    {{-- <td>{{$calificacion->alumno->nombre." ".$calificacion->alumno->ap_pat." ".$calificacion->alumno->ap_mat}}</td> --}}
    <td>{{$calificacion->alumno->nombre_completo}}</td>
    <td>{{$calificacion->calificacion}}</td>
    <td>{{$calificacion->idgrupo}} </td>

    <input type="hidden" id="docenteNombre" value="{{
      $calificacion->grupo->docente->nombre ." ".$calificacion->grupo->docente->ap_pat." ".
      $calificacion->grupo->docente->ap_mat.' - '.$calificacion->grupo->idcarrera
    }}"/>

    <td>
   {{ Form::open([ 'route' => ['Calificaciones.destroy',$calificacion->idcalificacion], 'method' => "DELETE"]) }}
   <a href="{{route('Calificaciones.edit',[$calificacion->idcalificacion])}}" class="btn btn-success btn-xs">Editar</a> |
     <button type="submit" class="btn btn-danger btn-xs">Eliminar</button>
   {{Form::close()}}
   </td>
 </tr>
 @endforeach
</tbody>
</table>
@endif

@endsection

@section('my_scripts')
   <script>
     $(document).ready(function(){
      //establecer el nombre del docente
       /*if($("#docenteNombre").val()!=""){
        $("#lblDocente").text($("#docenteNombre").val());
        $("#docenteNombre").val("");
       }*/
      var fecha = new Date();
      var dropdown = $("#periodos");
      dropdown.append($("<option/>").val("seleccione").text("Periodo"));
      var year = fecha.getFullYear() - 1;
      if(fecha.getMonth()<6)
        dropdown.append($("<option/>").val("ENE-JUN" + year.toString().substring(2)).text("ENE-JUN" + year.toString().substring(2)));
      dropdown.append($("<option/>").val("AGO-DIC" + year.toString().substring(2)).text("AGO-DIC" + year.toString().substring(2)));
      var year = fecha.getFullYear();
      dropdown.append($("<option/>").val("ENE-JUN" + year.toString().substring(2)).text("ENE-JUN" + year.toString().substring(2)));
      if(fecha.getMonth()>=6)
        dropdown.append($("<option/>").val("AGO-DIC" + year.toString().substring(2)).text("AGO-DIC" + year.toString().substring(2)));

      $("#periodos").change(function(){
        $.getJSON("/sgc/public/Grupos/gruposPeriodo/"+$(this).val(), {}, function (result) {
            //alert(JSON.stringify(result));
            var dropgrupo = $("#grupos");
            dropgrupo.empty();
            dropgrupo.append($("<option/>").val("seleccione").text("Grupo"));
            $.each(result, function () {
              //verificar si ya se tiene el grupo del postback
              var grupos = '{{  $grupos}}';
              if(grupos!="" && this.idgrupo == grupos){
                  dropgrupo.append($("<option/>").val(this.idgrupo).text(this.idgrupo).attr("selected","selected"));
                  $("#btnAgregar").attr("href","/sgc/public/Calificaciones/"+this.idgrupo);

                }
                //$("#grupos").val(grupos);//.change();
              else
                dropgrupo.append($("<option/>").val(this.idgrupo).text(this.idgrupo));
            });
            var length = $('#grupos > option').length;
           if(length == 1){
            $("#MyTable").empty();//limpiar tabla
            //limpiar nombre del docente
          $("#lblDocente").text('');
           }

        });
      });
      $("#grupos").change(function(e){
        e.preventDefault();
        //alert($(this).val());
        $('#formulario').attr('action', "/sgc/public/Calificaciones/"
        +$("#periodos").val()+"/"+$("#grupos").val()).submit();

      });
      $("#btnAgregar").click(function(){
        //verificar que el link tenga el atributo url
        if($(this).attr('href')==''){
          swal('Seleccione periodo y grupo');
          return false;
        }
      });
        //verificar si ya se tiene el periodo del postback
        var periodos = '{{  $periodos}}';
        if(periodos!="")
          dropdown.val(periodos).change();

          //alert(grupos);

     });


    /* if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", "/sgc/public/Calificaciones/");

    } */

     //agregar filtros y demas cosas a la tabla
     $('#MyTable').DataTable({ "language":
        { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" } });
   </script>
@endsection
