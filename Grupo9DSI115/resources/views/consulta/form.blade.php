<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="form-group">
                    {{ Form::label('paciente') }}
                    {{ Form::text('paciente_id', $consulta->paciente_id, ['class' => 'form-control' . ($errors->has('paciente_id') ? ' is-invalid' : ''), 'placeholder' => 'Paciente Id']) }}
                    {!! $errors->first('paciente_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-4 col-12">

                {{--<div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('doctor*') }}
                        {{ Form::select('persona_id', $doctores , $consulta->persona_id,['class' => 'form-control' . ($errors->has('persona_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un doctor']) }}
                        {!! $errors->first('persona_id', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                </div>--}}

                
                <div class="form-group">
                    {{ Form::label('doctor') }}
                    {{ Form::text('persona_id', $consulta->persona_id, ['class' => 'form-control' . ($errors->has('persona_id') ? ' is-invalid' : ''), 'placeholder' => 'Persona Id']) }}
                    {!! $errors->first('persona_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    {{ Form::label('fecha') }}
                    <div class="input-group date">
                        {{ Form::text('fecha', !empty($consulta->fecha) ? $consulta->fecha: '', ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'id'=>'inputFecha']) }}
                        <div class="input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>    
                    {!! $errors->first('fecha', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>    
                <script type="text/javascript">
                    $(function () {
                        $("#inputFecha").datetimepicker({
                            format: 'YYYY-MM-DD'
                            
                        });    
                    });
                </script>    
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    {{ Form::label('descripcion') }}
                    {{ Form::textarea('descripcion', $consulta->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion', 'rows'=>'6']) }}
                </div>
            </div>
        </div>
    </div>
    {{--<div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>--}}
</div>