<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombres*') }}
            {{ Form::text('nombrePersonas', !empty($persona->nombrePersonas) ? $persona->nombrePersonas : '', ['class' => 'form-control' . ($errors->has('nombrePersonas') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
            {!! $errors->first('nombrePersonas', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidos*') }}
            {{ Form::text('apellidoPersonas', !empty($persona->apellidoPersonas) ? $persona->apellidoPersonas : '', ['class' => 'form-control' . ($errors->has('apellidoPersonas') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
            {!! $errors->first('apellidoPersonas', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('DUI') }}
            {{ Form::text('dui', $persona->dui, ['class' => 'form-control' . ($errors->has('dui') ? ' is-invalid' : ''), 'placeholder' => 'DUI']) }}
            {!! $errors->first('dui', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono*') }}
            {{ Form::text('telefono', !empty($persona->telefono) ? $persona->telefono : '', ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            <!-- {{ Form::label('fecha de nacimiento') }}
            {{ Form::text('fechaDeNacimiento', $persona->fechaDeNacimiento, ['class' => 'form-control' . ($errors->has('fechaDeNacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fechade nacimiento']) }}
            {!! $errors->first('fechaDeNacimiento', '<div class="invalid-feedback">:message</p>') !!}
        </div> -->
            {{ Form::label('fecha de nacimiento*') }}
                    <div class="input-group date">
                        {{ Form::text('fechaDeNacimiento', !empty($persona->fechaDeNacimiento) ? $persona->fechaDeNacimiento : '', ['class' => 'form-control' . ($errors->has('fechaDeNacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de nacimiento', 'id' => 'inputFechaDeNacimiento']) }}
                        <div class="input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>
                    {!! $errors->first('fechaNacimiento', '<div class="invalid-feedback"><p>:message</p></div>') !!}
            </div>
                <script type="text/javascript">
                    $(function() {
                        $("#inputFechaDeNacimiento").datetimepicker({
                            format: 'YYYY-MM-DD',
                            maxDate: new Date()
                        })
                    })
                </script>
        <div class="form-group">
            {{ Form::label('NIT') }}
            {{ Form::text('nitPersona', $persona->nitPersona, ['class' => 'form-control' . ($errors->has('nitPersona') ? ' is-invalid' : ''), 'placeholder' => 'NIT']) }}
            {!! $errors->first('nitPersona', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Sexo*') }}
            {{ Form::select('sexo_id', $sexos, $persona->sexo_id, ['class' => 'form-control' . ($errors->has('sexo_id') ? ' is-invalid' : ''), 'placeholder' => 'Sexo']) }}
            {!! $errors->first('sexo_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('rol*') }}
            {{ Form::select('rolpersona_id', $roles, $persona->rolpersona_id, ['class' => 'form-control' . ($errors->has('rolpersona_id') ? ' is-invalid' : ''), 'placeholder' => 'Rol']) }}
            {!! $errors->first('rolpersona_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
  
</div>