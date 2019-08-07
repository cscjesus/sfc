<div class="form-horizontal">
    <h4>Docente</h4>
    <hr/>
    {{--para la iddocente--}}
    <div class="form-group">
    {{  Form::label('ncontrol', 'CLAVE', ['class' => 'control-label col-md-2']) }}
        <div class="col-md-10">
            {{ Form::text('iddocente',null,['required' => 'required','placeholder'=>'123...',
                'class'=>'form-control','title'=>'clave:123...','pattern'=>'^[0-9]{1,}$','autocomplete'=>'off',
                ]) }} {{-- 'disabled'=>'disabled' --}}
        </div>

    </div>
    {{--para el nombre--}}
    <div class="form-group">
    {{  Form::label('nombre', 'NOMBRE', ['class' => 'control-label col-md-2']) }}
        <div class="col-md-10">
                {{ Form::text('nombre',null,['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
        </div>
    </div>
    {{--para el ap_pat--}}
    <div class="form-group">
    {{  Form::label('ap_pat', 'AP. PAT.', ['class' => 'control-label col-md-2']) }}
        <div class="col-md-10">
                {{ Form::text('ap_pat',null,['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
        </div>
    </div>
    {{--para el ap_mat--}}
    <div class="form-group">
    {{  Form::label('ap_mat', 'AP. MAT.', ['class' => 'control-label col-md-2']) }}
        <div class="col-md-10">
                {{ Form::text('ap_mat',null,['required' => 'required','class'=>'form-control','autocomplete'=>'off'])}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
        </div>
    </div>
