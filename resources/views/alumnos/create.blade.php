@extends('shared._Layout')

@section('titulo','Agregar Estudiante')

@section('styles_laravel')
{{--estilos personalizado de create--}}
@endsection

@section('contenido')
{{--vista que despliega errores--}}
@include('shared.errores')

<h2>Agregar</h2>
{{ Form::model($alumno,[ 'route' => ['Alumnos.store',$alumno], 'method' => 'POST']) }}
    @include('shared.controlesAlumnos')
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>

            <button type="button" class="btn btn-info" data-toggle="modal"
            data-target="#myModalAdd" id="btnAgregarArchivo"
            data-backdrop="static" data-keyboard="false">Agregar archivo</button>
        </div>
    </div>
{!! Form::close() !!}


@include('shared.AgregarAlumnos')

<div>
    <a href="{{route('Alumnos.index')}}" class="btn btn-info">
        Regresar</a>
</div>

@endsection

@section('my_scripts')
<script>
  $(document).ready(
    function(){
      var mensaje ='{{$mensajes}}';
          if(mensaje !='')
            swal('¡Atención!',mensaje,'warning');
      $("#btnGuardar").click(function(){
        if($('#idcarrera').val()=="SELEC")
        {
          swal("seleccione una carrera");
          return false;
        }
      });
      $("#btnCancelarAlumnos").click(function(){
        $("#tabla tbody").empty();
            $("#errorAgregarAlumnos").html("");
            $("#upload").val("");
            $("#myModalAdd").modal("hide");
      });
      $("#btnAgregarAlumnos").click(function(){
          /*$("#ncontrol").removeAttr("required");
          $("#nombre").removeAttr("required");
          $("#ap_pat").removeAttr("required");
          $("#ap_mat").removeAttr("required");

          $.ajax({url:"http://localhost/sgc/public/Alumnos",
                    data: { "_token": "{{ csrf_token() }}",
                    "varios":'varios',//campo para que sepa en controlador que van a ser varios estudiantes
                    "ncontrol": "094",
                        "nombre": "abc",
                        "ap_pat": 'def',
                        "ap_mat": 'ghi',
                        "idcarrera": 'isc',
                        "idmodalidad": 1
                    },
                    method: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        $("#errorAgregarAlumnos").html(JSON.stringify(data));
                        //swal(JSON.stringify(data));
                    },
                    error:function(e){
                        //$("#errorAgregarAlumnos").html(JSON.stringify(e));
                    }
                });*/
          if (json_object != null) {
            $.each(JSON.parse(json_object), function () {
                $.ajax({url: "http://localhost/sgc/public/Alumnos",
                    data: {"_token": "{{ csrf_token() }}",
                    "varios":'varios',//campo para que sepa en controlador que van a ser varios estudiantes
                    "ncontrol": this.ncontrol,
                        "nombre": this.nombre.toUpperCase(),
                        "ap_pat": this.ap_paterno.toUpperCase(),
                        "ap_mat": this.ap_materno.toUpperCase(),
                        "idcarrera": this.carrera.toUpperCase(),
                    },
                    method: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        //alert(data);
                        if (data == "Agregado") {
                            //swal("Alumno Agregado")
                            //llenarTabla();
                        } else {
                            //swal("Error al agregar");
                            //return;
                            $("#errorAgregarAlumnos").html($("#errorAgregarAlumnos").html() +
                                    data + "<br>");
                        }
                    }
                });
            });
            //aqui se borraba todo...
        } else
            swal("Seleccione un archivo");

      });
      // para cargar el archivo de excel
    var json_object;//guarda los datos del archivo excel
    //para cargar el archivo de excel
    $('#upload').change(function(evt){

        var file = evt.target.files[0]; // FileList object
        var reader = new FileReader();
            reader.onload = function (e) {
                var data = e.target.result;
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function (sheetName) {
                    // Here is your object
                    var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    json_object = JSON.stringify(XL_row_object);
                    //recorrer las filas del archivo.
                    $.each(JSON.parse(json_object), function () {
                        //alert(this.ncontrol);

                        $("#tabla tbody").append("<tr>" +
                                "<td>" + this.ncontrol + "</td>" +
                                "<td>" + this.nombre + "</td>" +
                                "<td>" + this.ap_paterno + "</td>" +
                                "<td>" + this.ap_materno + "</td>" +
                                "<td>" + this.carrera + "</td>" +
                                "</tr>");
                    });
                    //console.log(JSON.parse(json_object));
                    //jQuery('#xlx_json').val(json_object);
                });
            };
            reader.onerror = function (ex) {
                console.log(ex);
            };
            reader.readAsBinaryString(file);
    });
 });
  </script>
@endsection
