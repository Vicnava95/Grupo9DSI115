<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombres') }}
            {{ Form::text('nombres', $paciente->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
            {!! $errors->first('nombres', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidos') }}
            {{ Form::text('apellidos', $paciente->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
            {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dui') }}
            {{ Form::text('dui', $paciente->dui, ['class' => 'form-control' . ($errors->has('dui') ? ' is-invalid' : ''), 'placeholder' => 'Dui']) }}
            {!! $errors->first('dui', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefonoCasa') }}
            {{ Form::text('telefonoCasa', $paciente->telefonoCasa, ['class' => 'form-control' . ($errors->has('telefonoCasa') ? ' is-invalid' : ''), 'placeholder' => 'Telefonocasa']) }}
            {!! $errors->first('telefonoCasa', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefonoCelular') }}
            {{ Form::text('telefonoCelular', $paciente->telefonoCelular, ['class' => 'form-control' . ($errors->has('telefonoCelular') ? ' is-invalid' : ''), 'placeholder' => 'Telefonocelular']) }}
            {!! $errors->first('telefonoCelular', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaDeNacimiento') }}
            {{ Form::text('fechaDeNacimiento', $paciente->fechaDeNacimiento, ['class' => 'form-control' . ($errors->has('fechaDeNacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fechadenacimiento']) }}
            {!! $errors->first('fechaDeNacimiento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', $paciente->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('referenciaPersonal') }}
            {{ Form::text('referenciaPersonal', $paciente->referenciaPersonal, ['class' => 'form-control' . ($errors->has('referenciaPersonal') ? ' is-invalid' : ''), 'placeholder' => 'Referenciapersonal']) }}
            {!! $errors->first('referenciaPersonal', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telReferenciaPersonal') }}
            {{ Form::text('telReferenciaPersonal', $paciente->telReferenciaPersonal, ['class' => 'form-control' . ($errors->has('telReferenciaPersonal') ? ' is-invalid' : ''), 'placeholder' => 'Telreferenciapersonal']) }}
            {!! $errors->first('telReferenciaPersonal', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ocupacion') }}
            {{ Form::text('ocupacion', $paciente->ocupacion, ['class' => 'form-control' . ($errors->has('ocupacion') ? ' is-invalid' : ''), 'placeholder' => 'Ocupacion']) }}
            {!! $errors->first('ocupacion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('correoElectronico') }}
            {{ Form::text('correoElectronico', $paciente->correoElectronico, ['class' => 'form-control' . ($errors->has('correoElectronico') ? ' is-invalid' : ''), 'placeholder' => 'Correoelectronico']) }}
            {!! $errors->first('correoElectronico', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sexo_id') }}
            {{ Form::text('sexo_id', $paciente->sexo_id, ['class' => 'form-control' . ($errors->has('sexo_id') ? ' is-invalid' : ''), 'placeholder' => 'Sexo Id']) }}
            {!! $errors->first('sexo_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>