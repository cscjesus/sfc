{{--@include('pasteles.partials.fields')  --}}
<div class="form-horizontal">
    <h4>Actividad</h4>
    <hr/>
    {{--para la idactividad--}}
    <div class="form-group">
    {{  Form::label('ncontrol', 'CLAVE', ['class' => 'control-label col-md-2']) }}
        <div class="col-md-10">
            {{ Form::text('idactividad',null,['required' => 'required','placeholder'=>'',
                'class'=>'form-control','title'=>'clave:123...','pattern'=>'^[0-9]{1,}$','autocomplete'=>'off',
                'disabled'=>'disabled']) }}
        </div>

    </div>
    {{--para el nombre--}}
    <div class="form-group">
    {{  Form::label('nombre', 'NOMBRE', ['class' => 'control-label col-md-2']) }}
        <div class="col-md-10">
                {{ Form::text('nombre',null,['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
        </div>
    </div>
    {{--para el tipo--}}
    <div class="form-group">
    {{  Form::label('tipo', 'TIPO', ['class' => 'control-label col-md-2']) }}
        <div class="col-md-10">
            {{Form::select('tipo',$tipos, null,['class'=>'form-control'])}}
        </div>
    </div>
    {{--para los creditos--}}
    <div class="form-group">
    {{  Form::label('creditos', 'CREDITOS', ['class' => 'control-label col-md-2']) }}
        <div class="col-md-10">
                {{ Form::number('creditos',null,['required' => 'required','class'=>'form-control','autocomplete'=>'off',
                'min'=>"1",'max'=>"5"])}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
        </div>
    </div>
