<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class=" {{ (Auth::user()->rols_fk!=3 && Auth::user()->rols_fk!=2)? 'col-md-12' : 'col-md-6' }} col-12">
                <div class="form-group">
                    {{ Form::label('Paciente*') }}
                    {{--<select class="custom-select custom-select-m bg-dark" style="color:lightgray">
                        <option selected >Seleccione un paciente</option>
                        @foreach ($pacientes as $paciente)
                            <option value="{{ $paciente['id'] }}"> {{ $paciente['nombres'] }} </option>
                        @endforeach
                    </select> --}}
                    {{ Form::text('paciente_id_hid', empty($consulta->paciente_id) ? '' : $consulta->Paciente->nombres.' '.$consulta->Paciente->apellidos, ['class' => 'form-control' . ($errors->has('paciente_id') ? ' is-invalid' : ''), 'placeholder' => 'Escriba y seleccione' , 'id' => 'paciente_id_hid']) }}

                    {{ Form::hidden('paciente_id', empty($consulta->paciente_id) ? '' : $consulta->paciente_id, ['class' => 'form-control' . ($errors->has('paciente_id') ? ' is-invalid' : ''), 'placeholder' => 'Paciente Id' , 'id' => 'paciente_id']) }}

                    {!! $errors->first('paciente_id', '<div class="invalid-feedback">:message</p>') !!}
                    <div id="listaPacientes" class="listaPacientes">
                    </div>
                </div>

            </div>
            @if (Auth::user()->rols_fk!=3 && Auth::user()->rols_fk!=2)
            <div class="{{ (Auth::user()->rols_fk!=3 && Auth::user()->rols_fk!=2)? 'col-md-6' : 'col-md-4' }} col-12">
                <div class="form-group">
                    {{ Form::label('Doctor*') }}
                       <select class="form-control custom-select custom-select-m bg-dark" style="color:lightgray" name="persona_id">
                         <option  >Seleccione un doctor</option>
                         @foreach ($personas as $persona)
                            @if ($consulta->persona_id == $persona->id)
                                <option selected value="{{ $persona['id'] }}"> {{ $persona['nombrePersonas'] }}  {{ $persona['apellidoPersonas'] }} </option>
                            @else
                                <option  value="{{ $persona['id'] }}"> {{ $persona['nombrePersonas'] }}  {{ $persona['apellidoPersonas'] }} </option>
                            @endif
                         @endforeach
                        </select>

                     {!! $errors->first('persona_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            @endif

            <div class="{{ (Auth::user()->rols_fk!=3 && Auth::user()->rols_fk!=2)? 'col-md-6' : 'col-md-6' }} col-12">
                <div class="form-group">
                    {{ Form::label('Fecha*') }}
                    <div class="input-group date">
                        {{ Form::text('fecha', empty($consulta->fecha) ? '': $consulta->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'id'=>'inputFecha']) }}
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
            <div class="col-md-6 col-12">
                <div class="form-group">
                    {{ Form::label('Peso del paciente') }}
                    {{ Form::text('peso', !empty($consulta->peso) ? $consulta->peso: '' ,['class' =>'form-control' .
                    ($errors->has('peso') ? 'is_invalid' : ''), 'placeholder' => 'peso en Kg']) }}
                    {!! $errors->first('peso', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                    <h6 style="color: gray" align="right">solo digitar cantidad</h6>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    {{ Form::label('Estatura del paciente') }}
                    {{ Form::text('estatura', !empty($consulta->estatura) ? $consulta->estatura: '' ,['class' =>'form-control' .
                    ($errors->has('estatura') ? 'is_invalid' : ''), 'placeholder' => 'estatura en metros']) }}
                    {!! $errors->first('estatura', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                    <h6 style="color: gray" align="right">solo digitar cantidad</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    {{ Form::label('Presion del paciente') }}
                    {{ Form::text('presion', !empty($consulta->presion) ? $consulta->presion: '' ,['class' =>'form-control' .
                    ($errors->has('presion') ? 'is_invalid' : ''), 'placeholder' => 'presion en mmHg']) }}
                    {!! $errors->first('presion', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                    <h6 style="color: gray" align="right">solo digitar cantidad</h6>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    {{ Form::label('Temperatura del paciente') }}
                    {{ Form::text('temperatura', !empty($consulta->temperatura) ? $consulta->temperatura: '' ,['class' =>'form-control' .
                    ($errors->has('temperatura') ? 'is_invalid' : ''), 'placeholder' => ' temperatura corporal en ºC']) }}
                    {!! $errors->first('temperatura', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                    <h6 style="color: gray" align="right" >solo digitar cantidad</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    {{ Form::label('Frecuencia cardiaca del paciente') }}
                    {{ Form::text('frecuencia_cardiaca', !empty($consulta->frecuencia_cardiaca) ? $consulta->frecuencia_cardiaca: '' ,['class' =>'form-control' .
                    ($errors->has('frecuencia_cardiaca') ? 'is_invalid' : ''), 'placeholder' => 'latidos/minuto']) }}
                    {!! $errors->first('temperatura', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                    <h6 style="color: gray" align="right">solo digitar cantidad</h6>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    {{ Form::label('Frecuencia respiratoria del paciente') }}
                    {{ Form::text('frecuencia_respiratoria', !empty($consulta->frecuencia_respiratoria) ? $consulta->frecuencia_respiratoria: '' ,['class' =>'form-control' .
                    ($errors->has('frecuencia_respiratoria') ? 'is_invalid' : ''), 'placeholder' => 'respiraciones/minuto']) }}
                    <h6 style="color: gray" align="right">solo digitar cantidad</h6>
                </div>
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
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    {{ Form::label('Examenes solicitados*') }}
                    {{ Form::textarea('solicitud_examen', $consulta->solicitud_examen, ['class' => 'form-control' .
                    ($errors->has('solicitud_examen') ? ' is-invalid' : ''), 'placeholder' => 'Listado de examenes solicitados', 'rows'=>'6']) }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function searchPaciente(name){
            $.ajax({
                method:'GET',
                url:'searchPaciente/'+ name,
                success:function(data){
                    $('#listaPacientes').fadeIn();
                    $('#listaPacientes').html(data);
                    console.log(data);
                }
            });
    }

    $('#paciente_id_hid').keyup(function(){
        var paciente = $('#paciente_id_hid').val();
        searchPaciente(paciente);

        if (paciente==' ' || paciente == ''){
            $('#listaPacientes').fadeOut();
        }

        console.log(paciente);
    });

    $(document).on('click', 'li', function(){
        $('#paciente_id_hid').val($(this).text());
        $('#listaPacientes').fadeOut();
        var a = this.value;
        console.log(a);
        document.getElementById('paciente_id').innerHTML = 5;
        $("#paciente_id").val(a);
    });

    $(document).ready(function(){
        //$("input[name='presion']").mask('000/00');
        $("input[name='temperatura']").mask('00.0');
        $("input[name='estatura']").mask('0.00');
        $("input[name='peso']").mask('00.00');
        $("input[name='frecuencia_respiratoria']").mask('000');
        $("input[name='frecuencia_cardiaca']").mask('000');


    });



</script>
