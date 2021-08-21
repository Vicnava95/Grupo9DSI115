<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('fecha') }}
                    <div class="input-group date">
                        {{ Form::text('fecha', !empty($cita->fecha) ? $citaa->fecha: '', ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'id'=>'inputFecha']) }}
                        <div class="input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>
                    {!! $errors->first('fecha', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                <script type="text/javascript">
                    $(function () {
                        $("#inputFecha").datetimepicker({
                            format: 'YYYY-MM-DD'

                        });
                    });
                </script>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('hora') }}
                    {{ Form::text('hora', $cita->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
                    {!! $errors->first('hora', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('paciente_id') }}
                    {{ Form::text('paciente_id', $cita->paciente_id, ['class' => 'form-control' . ($errors->has('paciente_id') ? ' is-invalid' : ''), 'placeholder' => 'Paciente Id']) }}
                    {!! $errors->first('paciente_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('persona_id') }}
                    {{ Form::text('persona_id', $cita->persona_id, ['class' => 'form-control' . ($errors->has('persona_id') ? ' is-invalid' : ''), 'placeholder' => 'Persona Id']) }}
                    {!! $errors->first('persona_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('estadoCita_id') }}
                    {{ Form::text('estadoCita_id', $cita->estadoCita_id, ['class' => 'form-control' . ($errors->has('estadoCita_id') ? ' is-invalid' : ''), 'placeholder' => 'Estadocita Id']) }}
                    {!! $errors->first('estadoCita_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>    
        </div>        
    </div>
</div>

