@extends('shared._Layout')

@section('titulo','Agregar Estudiante')

@section('styles_laravel')
{{--estilos personalizado de create--}}
@endsection

@section('contenido')
{{--vista que despliega errores--}}
@include('shared.errores')

<h2>Agregar</h2>
{{-- verificar si es un postback--}}
@if(empty($alumno)){{--si alumno esta vacio, entonces no se ha hecho postback --}}
  {{ Form::open([ 'route' => 'Alumnos.store', 'method' => 'POST','enctype'=>'multipart/form-data']) }}
      {{--@include('pasteles.partials.fields')  --}}
      <div class="form-horizontal">
      <h4>Estudiante</h4>

   
        
      <hr/>
      {{--para la ncontrol--}} 
      <div class="form-group">
      {{  Form::label('ncontrol', 'NCONTROL', ['class' => 'control-label col-md-2']) }}
          <div class="col-md-10">
              {{ Form::text('ncontrol','',['required' => 'required','placeholder'=>'12345678',
                  'class'=>'form-control','title'=>'ncontrol:12345678','pattern'=>'^[0-9]{8}$','autocomplete'=>'off']) }}
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

      {{--para la modalidad--}} 
      <div class="form-group">
              {{  Form::label('idmodalidad', 'MODALIDAD', ['class' => 'control-label col-md-2']) }}
              <div class="col-md-10">
  {{Form::select('idmodalidad',$modalidades, 'Seleccione Modalidad',['class'=>'form-control'])}}
              </div>
      </div>
      {{--para la carrera--}} 
      <div class="form-group">
              {{  Form::label('idcarrera', 'CARRERA', ['class' => 'control-label col-md-2']) }}
              <div class="col-md-10">
                  {{--@php ($carreras["seleccione"]="asdfadsf")--}}
  {{Form::select('idcarrera',$carreras, 'Seleccione Carrera',['class'=>'form-control'])}}
              </div>
      </div>
      {{-- </div> --}}
      <div class="form-group">
          <div class="col-md-offset-2 col-md-10">
              <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>

              <button type="button" class="btn btn-info" data-toggle="modal" 
              data-target="#myModalAdd" id="btnAgregarArchivo" 
              data-backdrop="static" data-keyboard="false">Agregar archivo</button>
          </div>
      </div>


      

  {!! Form::close() !!}
@else{{-- ya se ha hecho un postback y se deben llenar las cajas con los valores del usuario--}}
{{ Form::open([ 'route' => 'Alumnos.store', 'method' => 'POST','enctype'=>'multipart/form-data']) }}
      {{--@include('pasteles.partials.fields')  --}}
      <div class="form-horizontal">
      <h4>Estudiante</h4>
      <hr/>
      {{--para la ncontrol--}} 
      <div class="form-group">
      {{  Form::label('ncontrol', 'NCONTROL', ['class' => 'control-label col-md-2']) }}
          <div class="col-md-10">
              {{ Form::text('ncontrol',$alumno->ncontrol,['required' => 'required','placeholder'=>'12345678',
                  'class'=>'form-control','title'=>'ncontrol:12345678','pattern'=>'^[0-9]{8}$','autocomplete'=>'off']) }}
          </div>
      </div>
      {{--para el nombre--}} 
      <div class="form-group">
      {{  Form::label('nombre', 'NOMBRE', ['class' => 'control-label col-md-2']) }}
          <div class="col-md-10">
                  {{ Form::text('nombre',$alumno->nombre,['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
          </div>
      </div>
      {{--para el ap_pat--}} 
      <div class="form-group">
      {{  Form::label('ap_pat', 'AP. PAT.', ['class' => 'control-label col-md-2']) }}
          <div class="col-md-10">
                  {{ Form::text('ap_pat',$alumno->ap_pat,['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
          </div>
      </div>
      {{--para el ap_mat--}} 
      <div class="form-group">
      {{  Form::label('ap_mat', 'AP. MAT.', ['class' => 'control-label col-md-2']) }}
          <div class="col-md-10">
                  {{ Form::text('ap_mat',$alumno->ap_mat,['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
          </div>
      </div>

      {{--para la modalidad--}} 
      <div class="form-group">
              {{  Form::label('idmodalidad', 'MODALIDAD', ['class' => 'control-label col-md-2']) }}
              <div class="col-md-10">
  {{Form::select('idmodalidad',$modalidades, $alumno->idmodalidad,['class'=>'form-control'])}}
              </div>
      </div>
      {{--para la carrera--}} 
      <div class="form-group">
              {{  Form::label('idcarrera', 'CARRERA', ['class' => 'control-label col-md-2']) }}
              <div class="col-md-10">
                  {{--@php ($carreras["seleccione"]="asdfadsf")--}}
  {{Form::select('idcarrera',$carreras, $alumno->idcarrera,['class'=>'form-control'])}}
              </div>
      </div>
      {{-- </div> --}}
     <div class="form-group">
          <div class="col-md-offset-2 col-md-10">
              <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
          </div>
      </div>

  {{ Form::close() }}

 
       
@endif


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
    var ExcelToJSON = function () {
        this.parseExcel = function (file) {
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
                                //"<td>"+this.ap_pat+"</td>"+
                                "<td>" + this.ap_paterno + "</td>" +
                                //"<td>"+this.ap_mat+"</td>"+
                                "<td>" + this.ap_materno + "</td>" +
                                //"<td>"+this.idcarrera+"</td>"+
                                "<td>" + this.carrera + "</td>" +
                                "</tr>");
                    });
                    //console.log(JSON.parse(json_object));
                    //jQuery('#xlx_json').val(json_object);
                })
            };
            reader.onerror = function (ex) {
                console.log(ex);
            };
            reader.readAsBinaryString(file);
        };
    };
    function handleFileSelect(evt) {

        var files = evt.target.files; // FileList object
        var xl2json = new ExcelToJSON();
        xl2json.parseExcel(files[0]);
    }
    //para cargare el archivo de excel
    document.getElementById('upload').addEventListener('change', handleFileSelect, false);
    });
  </script>
@endsection