@extends('shared._Layout')

@section('titulo','agregar grupo')

@section('styles_laravel')
{{--estilos personalizado de create--}}

@endsection

@section('contenido')

@include('shared.errores')

<h2>Agregar</h2>
@if (empty($request))
  {{ Form::open([ 'route' => 'Grupos.store', 'method' => 'POST','enctype'=>'multipart/form-data']) }}
  {{--@include('pasteles.partials.fields')  --}}
  <div class="form-horizontal">
  <h4>Grupo</h4>
  <hr/>
  {{--para la materia--}} 
  <div class="form-group">
  {{  Form::label('idgrupo', 'MATERIA', ['class' => 'control-label col-md-2']) }}
      <div class="col-md-10">
          {{ Form::text('idgrupo','',['required' => 'required','placeholder'=>'',
              'class'=>'form-control','autocomplete'=>'off']) }}
      </div>
      
  </div>
  {{--para el periodo--}} 
  <div class="form-group">
  {{  Form::label('periodo', 'PERIODO', ['class' => 'control-label col-md-2']) }}
      <div class="col-md-10">
              {{ Form::text('periodo','',['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
      </div>
  </div>
  {{--para el grado--}} 
  <div class="form-group">
  {{  Form::label('grado', 'GRADUO Y GRUPO', ['class' => 'control-label col-md-2']) }}
      <div class="col-md-10">
        <div class="col-md-2" style="padding-left:0">
            {{ Form::select('grado',$grados,'',['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
        </div>
      
        <div class="col-md-2" style="padding-left:0">
            {{ Form::select('grupo',$grupos,'',['required' => 'required','class'=>'form-control','autocomplete'=>'off',
            "id"=>"grupo"])}}
        </div>
        <div class="col-md-8"></div>
      </div>
  </div>
  {{--para el docente--}} 
  <div class="form-group">
  {{  Form::label('iddocente', 'DOCENTE', ['class' => 'control-label col-md-2']) }}
      <div class="col-md-10">
          {{Form::select('iddocente',$docentes, 'Seleccione',['class'=>'form-control'])}}      
      </div>
  </div>
  {{--para la actividad--}} 
  <div class="form-group">
  {{  Form::label('idactividad', 'ACTIVIDAD', ['class' => 'control-label col-md-2']) }}
      <div class="col-md-10">
        {{Form::select('idactividad',$actividades, 'Seleccione',['class'=>'form-control'])}}
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

  <div class="form-group">
      <div class="col-md-offset-2 col-md-10">
          <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
      </div>
  </div>
  {!! Form::close() !!}

  @else
  {{ Form::open([ 'route' => 'Grupos.store', 'method' => 'POST','enctype'=>'multipart/form-data']) }}
  {{--@include('pasteles.partials.fields')  --}}
  <div class="form-horizontal">
  <h4>Grupo</h4>
  <hr/>
  {{--para la materia--}} 
  <div class="form-group">
  {{  Form::label('idgrupo', 'MATERIA', ['class' => 'control-label col-md-2']) }}
      <div class="col-md-10">
          {{ Form::text('idgrupo',$request->idgrupo,['required' => 'required','placeholder'=>'',
              'class'=>'form-control','autocomplete'=>'off']) }}
      </div>
      
  </div>
  {{--para el periodo--}} 
  <div class="form-group">
  {{  Form::label('periodo', 'PERIODO', ['class' => 'control-label col-md-2']) }}
      <div class="col-md-10">
              {{ Form::text('periodo',$request->periodo,['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
      </div>
  </div>
  {{--para el grado--}} 
  <div class="form-group">
  {{  Form::label('grado', 'GRADUO Y GRUPO', ['class' => 'control-label col-md-2']) }}
      <div class="col-md-10">
        <div class="col-md-2" style="padding-left:0">
            {{ Form::select('grado',$grados,$request->grado,['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
        </div>
      
        <div class="col-md-2" style="padding-left:0">
            {{ Form::select('grupo',$grupos,$request->grupo,['required' => 'required','class'=>'form-control','autocomplete'=>'off',
            "id"=>"grupo"])}}
        </div>
        <div class="col-md-8"></div>
      </div>
  </div>
  {{--para el docente--}} 
  <div class="form-group">
  {{  Form::label('iddocente', 'DOCENTE', ['class' => 'control-label col-md-2']) }}
      <div class="col-md-10">
          {{Form::select('iddocente',$docentes, $request->iddocente,['class'=>'form-control'])}}      
      </div>
  </div>
  {{--para la actividad--}} 
  <div class="form-group">
  {{  Form::label('idactividad', 'ACTIVIDAD', ['class' => 'control-label col-md-2']) }}
      <div class="col-md-10">
        {{Form::select('idactividad',$actividades, $request->idactividad,['class'=>'form-control'])}}
      </div>
  </div>

  {{--para la carrera--}} 
  <div class="form-group">
    {{  Form::label('idcarrera', 'CARRERA', ['class' => 'control-label col-md-2']) }}
    <div class="col-md-10">
        {{--@php ($carreras["seleccione"]="asdfadsf")--}}
  {{Form::select('idcarrera',$carreras, $request->idcarrera,['class'=>'form-control'])}}
    </div>
  </div>

  <div class="form-group">
      <div class="col-md-offset-2 col-md-10">
          <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
      </div>
  </div>
  {!! Form::close() !!}
@endif

<div>
  <a href="{{route('Grupos.index')}}" class="btn btn-info">
      Regresar</a>
</div>
@endsection

@section('my_scripts')
   <script>
   $(document).ready(function(){
        var mensaje ='{{$mensajes}}';
        if(mensaje !='')
          swal('¡Atención!',mensaje,'warning');
        $("#periodo").val(cargarPeriodo);

        $("#idcarrera").change(function(){
          //generar de forma automatica idgrupo
          var fecha = new Date();
          var year = fecha.getFullYear().toString().substring(2);
          if ($("#grado").val() == "seleccione")
          {
              swal("Seleccion un grado");
              $(this).val("SELEC");
              return;
          }
          if ($("#grupo").val() == "seleccione")
          {
              swal("Seleccion un grupo");
              $(this).val("SELEC");
              return;
          }
          $("#idgrupo").val($("#grado").val() + $("#grupo").val() + $(this).val() + year);
        });
   });


   //funcion para cargar el periodo
  function cargarPeriodo(){
    var fecha = new Date();
        var mes = fecha.getMonth() + 1;
        //alert(fecha.getFullYear());
        //alert(fecha.getMonth()+1);
        var periodo = "";
        switch (mes) {
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
                periodo = "ENEJUN";
                break;
            case 7:
            case 8:
            case 9:
            case 10:
            case 11:
            case 12:
                periodo = "AGODIC";
                break;
        }
        periodo += fecha.getFullYear().toString().substring(2);
        return periodo;
  }
   </script>
@endsection