 {{--@include('pasteles.partials.fields')  --}}
 <div class="form-horizontal">
    <h4>Estudiante</h4>
    <hr/>
    {{--para la ncontrol--}}
    <div class="form-group">
    {{  Form::label('ncontrol', 'NCONTROL', ['class' => 'control-label col-md-2']) }}
        <div class="col-md-10">
            {{ Form::text('ncontrol',null,['required' => 'required','placeholder'=>'12345678',
                'class'=>'form-control','title'=>'ncontrol:12345678','pattern'=>'^[0-9]{8}$','autocomplete'=>'off',
                 ]) }} {{--'disabled'=>'disabled'--}}
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

    {{--para la modalidad--}}
    <div class="form-group">
            {{  Form::label('idmodalidad', 'MODALIDAD', ['class' => 'control-label col-md-2']) }}
            <div class="col-md-10">
{{Form::select('idmodalidad',$modalidades, null,['class'=>'form-control'])}}
            </div>
    </div>
    {{--para la carrera--}}
    <div class="form-group">
            {{  Form::label('idcarrera', 'CARRERA', ['class' => 'control-label col-md-2']) }}
            <div class="col-md-10">
                {{--@php ($carreras["seleccione"]="asdfadsf")--}}
{{Form::select('idcarrera',$carreras,null,['class'=>'form-control'])}}
            </div>
    </div>
    {{-- </div> --}}

