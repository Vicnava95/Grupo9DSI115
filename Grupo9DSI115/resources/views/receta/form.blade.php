<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="form-group">
                    {{ Form::label('consulta_id') }}
                    {{ Form::text('consulta_id', $receta->consulta_id, ['class' => 'form-control' . ($errors->has('consulta_id') ? ' is-invalid' : ''), 'placeholder' => 'Consulta Id']) }}
                    {!! $errors->first('consulta_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('fecha receta') }}
                    <div class="input-group date">
                        {{ Form::text('fecha', !empty($receta->fecha) ? $receta->fecha: '', ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha','id'=>'inputFecha']) }}
                        <div class="input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>
                    {!! $errors->first('fecha', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            {{--<script type="text/javascript"> //revisar
                    $(function () {
                        $("#inputFecha").datetimepicker({
                            format: 'YYYY-MM-DD'

                        });
                    });
                </script> --}}


            </div>
            <div class="col-12">
                <div class="form-group">
                    {{ Form::label('descripcion') }}
                    {{ Form::textarea('descripcion', $receta->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="form-group">
                    {{ Form::label('paciente_id') }}
                    {{ Form::text('paciente_id', $receta->paciente_id, ['class' => 'form-control' . ($errors->has('paciente_id') ? ' is-invalid' : ''), 'placeholder' => 'Paciente Id']) }}
                    {!! $errors->first('paciente_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('proximaCita') }}
                    <div class="input-group date">
                        {{ Form::text('proximaCita', !empty($receta->proximaCita) ? $receta->proximaCita: '', ['class' => 'form-control' . ($errors->has('proximaCita') ? ' is-invalid' : ''), 'placeholder' =>  'Proximacita', 'id' = 'inputFecha']) }}
                        <div class="input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>
                    {!! $errors->first('proximaCita', '<div class="invalid-feedback">:message</p>') !!}
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
    </div>
    {{--<div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>--}}
</div>
