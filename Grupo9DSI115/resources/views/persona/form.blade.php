<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombrePersonas') }}
            {{ Form::text('nombrePersonas', $persona->nombrePersonas, ['class' => 'form-control' . ($errors->has('nombrePersonas') ? ' is-invalid' : ''), 'placeholder' => 'Nombrepersonas']) }}
            {!! $errors->first('nombrePersonas', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidoPersonas') }}
            {{ Form::text('apellidoPersonas', $persona->apellidoPersonas, ['class' => 'form-control' . ($errors->has('apellidoPersonas') ? ' is-invalid' : ''), 'placeholder' => 'Apellidopersonas']) }}
            {!! $errors->first('apellidoPersonas', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dui') }}
            {{ Form::text('dui', $persona->dui, ['class' => 'form-control' . ($errors->has('dui') ? ' is-invalid' : ''), 'placeholder' => 'Dui']) }}
            {!! $errors->first('dui', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $persona->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaDeNacimiento') }}
            {{ Form::text('fechaDeNacimiento', $persona->fechaDeNacimiento, ['class' => 'form-control' . ($errors->has('fechaDeNacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fechadenacimiento']) }}
            {!! $errors->first('fechaDeNacimiento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nitPersona') }}
            {{ Form::text('nitPersona', $persona->nitPersona, ['class' => 'form-control' . ($errors->has('nitPersona') ? ' is-invalid' : ''), 'placeholder' => 'Nitpersona']) }}
            {!! $errors->first('nitPersona', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Sexo') }}
            {{ Form::select('sexo_id', $sexos, $persona->sexo_id, ['class' => 'form-control' . ($errors->has('sexo_id') ? ' is-invalid' : ''), 'placeholder' => 'Sexo']) }}
            {!! $errors->first('sexo_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('rolpersona_id') }}
            {{ Form::select('rolpersona_id', $roles, $persona->rolpersona_id, ['class' => 'form-control' . ($errors->has('rolpersona_id') ? ' is-invalid' : ''), 'placeholder' => 'Rolpersona Id']) }}
            {!! $errors->first('rolpersona_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>