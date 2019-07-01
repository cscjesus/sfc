@extends('shared._Layout')

@section('titulo','agregar calificacion')

@section('styles_laravel')
{{--estilos personalizado de create--}}
@endsection

@section('contenido')

@include('shared.errores')

<h2>Agregar</h2>
{{ Form::open([ 'route' => 'Calificaciones.store', 'method' => 'POST','enctype'=>'multipart/form-data']) }}
{{--@include('pasteles.partials.fields')  --}}
<div class="form-horizontal">
<h4>Calificacion</h4>
<hr/>
{{--para la iddocente--}} 
<div class="form-group">
{{  Form::label('idgrupo', 'GRUPO', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
        {{ Form::text('idgrupo',$idgrupo,['required' => 'required','class'=>'form-control']) }}
    </div>
    
</div>
{{--para el nombre--}} 
<div class="form-group">
{{  Form::label('ncontrol', 'NCONTROL', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
            {{ Form::text('ncontrol','',['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
    </div>
</div>
{{--para el ap_pat--}} 
<div class="form-group">
{{  Form::label('nombre', 'NOMBRE', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
            {{ Form::text('nombre','',['required' => 'required','class'=>'form-control','autocomplete'=>'off',
            'readonly'=>''])}}
    </div>
</div>
{{--para el ap_mat--}} 
<div class="form-group">
{{  Form::label('calificacion', 'CALIFICACION', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
            {{ Form::select('calificacion',$calificaciones,'',['required' => 'required','class'=>'form-control','autocomplete'=>'off',
            "id"=>"calificacion"])}}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
        <button type="button" class="btn btn-info" data-toggle="modal" 
        data-target="#myModalAdd" id="btnAgregarArchivo" 
        data-backdrop="static" data-keyboard="false">Agregar archivo</button>
    </div>
</div>
{!! Form::close() !!}
@include('shared.AgregarCalificaciones')
<div>
  <a href="{{route('Calificaciones.index').'/'.$periodo.'/'.$idgrupo}}" class="btn btn-info">
      Regresar</a>
</div>

@endsection

@section('my_scripts')
   <script>
     $(document).ready(function(){
       $('#idgrupo').focus();
       $('#ncontrol').focusout(function(){
        var ncontrol =$('#ncontrol').val();
        //verificar que el campo ncontrol tenga algo
        if(ncontrol=='' && archivo==false)
          {
            swal("proporcione un numero de control");
            $("#nombre").val("");
            return;
          }
        //recuperar el nombre del estudiante si no es archivo
        if(archivo == false)
          $.ajax({url:"/sgc/public/Alumnos/"+ncontrol,
          method:"GET",success:function(r){
              if(r=='' )
                swal("El Estudiante no existe");
              else{
                  $("#nombre").val(r);    
                }
          }}); 
       });
       //verificar si se ha seleccionado una calificaciones
       $("#btnGuardar").click(function(){
         if($("#calificacion").val()=='seleccione')
         {
           swal("seleccione una calificacion");
           return false;
         }
       });
     //});

     $("#btnAgregarCalificaciones").click(function(){
      if (json_object != null) {
            $.each(JSON.parse(json_object), function () {
                $.ajax({url: "http://localhost/sgc/public/Calificaciones",
                    data: {"_token": "{{ csrf_token() }}",
                    "varios":'varios',//campo para que sepa en controlador que van a ser varios estudiantes
                    "ncontrol": this.ncontrol,
                    "idgrupo":$("#idgrupo").val(),
                        "nombre": this.nombre.toUpperCase(),
                        "ap_pat": this.ap_paterno.toUpperCase(),
                        "ap_mat": this.ap_materno.toUpperCase(),
                        "calificacion": this.calificacion.toUpperCase()
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
                            $("#errorAgregarCalificaciones").html($("#errorAgregarCalificaciones").html() +
                                    data + "<br>");
                        }
                    }
                });
            });
            $("#errorAgregarCalificaciones").html($("#errorAgregarCalificaciones").html() + "OK <br>");
            //para que no se mande un postback
            return false;
        } else
            swal("Seleccione un archivo");
      } );
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
                                "<td>" + this.calificacion + "</td>" +
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
    //verificar si se desea agrega un archivo
    var archivo = false;
    $("#btnAgregarArchivo").click(function(){
      archivo = true;
      $("#ncontrol").removeAttr('required');
     });
     $("#btnCancelarCalificaciones").click(function(){
       //se cerro el cuadro para agregar varias calificaciones
        archivo = false;
        $("#ncontrol").attr('required','');
     });
    });
   </script>
@endsection