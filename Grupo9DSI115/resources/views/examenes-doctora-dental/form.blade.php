<div class="box box-info padding-1">
    <div class="box-body">

        @empty(!$examenesDoctoraDental->imagen)
            <div class="form-group">
                <label for="imagenActual">Imagen actual:</label>
                <a href="/examenesDentalesImagenes/{{ $examenesDoctoraDental->imagen }}" target="_blank">
                    <img name="imagenActual" src="/examenesDentalesImagenes/{{ $examenesDoctoraDental->imagen }}" class="mt-2 img-fluid">
                </a>
            </div>
        @endempty

        <div class="form-group">
            {{ Form::label('imagen') }}
            {{ Form::file('imagen', ['class' => 'form-control ' . ($errors->has('imagen') ? ' is-invalid' : ''),
            'id' => 'imagen', 'lang'=> 'es']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</p>') !!}    
        </div>

        <div class="form-group">
            {{ Form::label('fecha') }}
            <div class="input-group date">
                {{ Form::text('fecha', $examenesDoctoraDental->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'id'=>'inputFecha']) }}
                {!! $errors->first('fecha', '<div class="invalid-feedback">:message</p>') !!}
                <div class="input-group-addon input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
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
            {{ Form::textArea('descripcion', $examenesDoctoraDental->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion', 'rows'=>'4']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('expediente_doctora_dental_id') }}
            {{ Form::text('expediente_doctora_dental_id', $examenesDoctoraDental->expediente_doctora_dental_id, ['class' => 'form-control' . ($errors->has('expediente_doctora_dental_id') ? ' is-invalid' : ''), 'placeholder' => 'Expediente Doctora Dental Id']) }}
            {!! $errors->first('expediente_doctora_dental_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    </div>
</div>