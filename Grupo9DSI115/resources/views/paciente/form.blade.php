<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('nombres') }}
                    {{ Form::text('nombres',!empty($paciente->nombres) ? $paciente->nombres: '', ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
                    {!! $errors->first('nombres', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('apellidos') }}
                    {{ Form::text('apellidos',!empty($paciente->apellidos)? $paciente->apellidos:'' , ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
                    {!! $errors->first('apellidos', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('dui') }}
                    {{ Form::text('dui',!empty($paciente->dui)? $paciente->dui:'', ['class' => 'form-control' . ($errors->has('dui') ? ' is-invalid' : ''), 'placeholder' => 'Dui']) }}
                    {!! $errors->first('dui', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('telefono de casa') }}
                    {{ Form::text('telefonoCasa',!empty($paciente->telefonoCasa)? $paciente->telefonoCasa:'', ['class' => 'form-control' . ($errors->has('telefonoCasa') ? ' is-invalid' : ''), 'placeholder' => 'Telefonocasa']) }}
                    {!! $errors->first('telefonoCasa', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('telefono celular') }}
                    {{ Form::text('telefonoCelular',!empty($paciente->telefonoCelular)? $paciente->telefonoCelular:'', ['class' => 'form-control' . ($errors->has('telefonoCelular') ? ' is-invalid' : ''), 'placeholder' => 'Telefonocelular']) }}
                    {!! $errors->first('telefonoCelular', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('fecha de nacimiento') }}
                    <div class="input-group date" >
                        {{ Form::text('fechaDeNacimiento',!empty($paciente->fechaDeNacimiento)? $paciente->fechaDeNacimiento:'', ['class' => 'form-control' . ($errors->has('fechaDeNacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fechadenacimiento', 'id'=>'inputFechaDeNacimiento']) }}
                        <div class="input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>
                    {!! $errors->first('fechaNacimiento', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
                <script type="text/javascript">
                    $(function () {
                        $("#inputFechaDeNacimiento").datetimepicker({
                            format: 'YYYY/MM/DD',
                        });    
                    });
                 </script>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('direccion') }}
                    {{ Form::text('direccion', !empty($paciente->direccion)? $paciente->direccion: '', ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('referencia personal') }}
                    {{ Form::text('referenciaPersonal',!empty($paciente->referenciaPersonal)? $paciente->referenciaPersonal: '', ['class' => 'form-control' . ($errors->has('referenciaPersonal') ? ' is-invalid' : ''), 'placeholder' => 'Referenciapersonal']) }}
                    {!! $errors->first('referenciaPersonal', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('telefono de referencia personal') }}
                    {{ Form::text('telReferenciaPersonal', !empty($paciente->telReferenciaPersonal) ? $paciente->telReferenciaPersonal:'', ['class' => 'form-control' . ($errors->has('telReferenciaPersonal') ? ' is-invalid' : ''), 'placeholder' => 'Telreferenciapersonal']) }}
                    {!! $errors->first('telReferenciaPersonal', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('ocupacion') }}
                    {{ Form::text('ocupacion',!empty($paciente->ocupacion)? $paciente->ocupacion: '', ['class' => 'form-control' . ($errors->has('ocupacion') ? ' is-invalid' : ''), 'placeholder' => 'Ocupacion']) }}
                    {!! $errors->first('ocupacion', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('correo electronico') }}
                    {{ Form::text('correoElectronico', !empty($paciente->correoElectronico)? $paciente->correoElectronico :'', ['class' => 'form-control' . ($errors->has('correoElectronico') ? ' is-invalid' : ''), 'placeholder' => 'Correoelectronico']) }}
                    {!! $errors->first('correoElectronico', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
            
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('Sexo') }}
                    <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                                {{ Form::radio('sexo_id', 1, !empty($paciente->sexo_id) && $paciente->sexo->id==1 ? true : false,['class' => 'selectgroup-input' . ($errors->has('sexo_id') ? ' is-invalid' : ''),'value'=>'1']) }}
                                <span class="selectgroup-button">Hombre</span>
                            </label>
                            <label class="selectgroup-item">
                                {{ Form::radio('sexo_id', 2, !empty($paciente->sexo_id) && 
                                $paciente->sexo->id==2 ? true : false, ['class' => 'selectgroup-input' . ($errors->has('sexo_id') ? ' is-invalid' : ''), 'value'=>'2']) }}
                                <span class="selectgroup-button">Mujer</span>    
                            </label>
                    </div>
                </div>
            </div>
            <!--
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('sexo') }}
                    {{ Form::text('sexo_id', !empty($paciente->sexo_id)? $paciente->sexo_id: '', ['class' => 'form-control' . ($errors->has('sexo_id') ? ' is-invalid' : ''), 'placeholder' => 'Sexo Id']) }}
                    {!! $errors->first('sexo_id', '<div class="invalid-feedback"><p>message</p></div>') !!}
                </div>
            </div> -->
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary float-right">Enviar</button>
    </div>
</div>