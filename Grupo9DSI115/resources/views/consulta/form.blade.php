<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="form-group">
                    {{ Form::label('Paciente*') }}                    
                    <select class="custom-select custom-select-m bg-dark" style="color:lightgray">
                        <option selected >Seleccione un paciente</option>
                        @foreach ($pacientes as $paciente)
                            <option value="{{ $paciente['id'] }}"> {{ $paciente['nombres'] }} </option>
                        @endforeach
                    </select>
                    {{-- Form::text('paciente_id', $consulta->paciente_id, ['class' => 'form-control' . ($errors->has('paciente_id') ? ' is-invalid' : ''), 'placeholder' => 'Paciente Id']) --}}
                    {!! $errors->first('paciente_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-4 col-12">
                
                <div class="form-group">
                    {{ Form::label('Doctor*') }}
                    <select class="custom-select custom-select-m bg-dark" style="color:lightgray">
                        <option selected >Seleccione un doctor</option>
                        @foreach ($personas as $persona)
                            <option value="{{ $persona['id'] }}"> {{ $persona['nombrePersonas'] }} </option>
                        @endforeach
                    </select>
                    {!! $errors->first('persona_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>

            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    {{ Form::label('Fecha*') }}
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
                    {{ Form::label('Descripcion*') }}
                    {{ Form::textarea('descripcion', $consulta->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion', 'rows'=>'6']) }}
                </div>
            </div>
        </div>
    </div>
</div>
