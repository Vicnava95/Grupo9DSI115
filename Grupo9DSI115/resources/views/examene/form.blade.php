<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('imagen') }}
            {{ Form::text('imagen', $examene->imagen, ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            <div class="input-group date">
                {{ Form::text('fecha', $examene->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'id'=>'inputFecha']) }}
                {!! $errors->first('fecha', '<div class="invalid-feedback">:message</p>') !!}
                <div class="input-group-addon input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                {!! $errors->first('fecha', '<div class="invalid-feedback">:message</p>') !!}
                    <script type="text/javascript">
                        $(function () {
                            var hoy = new Date();
                            hoy.setDate(hoy.getDate() - 1);
                            $("#inputFecha").datetimepicker({
                                format: 'YYYY-MM-DD',
                                minDate: hoy
                            });
                        });
                    </script>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::textArea('descripcion', $examene->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion', 'rows'=>'4']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('consulta_id') }}
            {{ Form::text('consulta_id', $examene->consulta_id, ['class' => 'form-control' . ($errors->has('consulta_id') ? ' is-invalid' : ''), 'placeholder' => 'Consulta Id']) }}
            {!! $errors->first('consulta_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>