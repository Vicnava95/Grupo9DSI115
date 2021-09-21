
        <form id="formEstadoCita" action="{{route('citas.programated', $cita->id)}}" method="GET">
            {{ method_field('PATCH') }}
            @csrf
            <div class="modal-content bg-dark">
                
                <div class="modal-body" id="mediumBody">
                    <p>¿Quieres reprogramar la fecha?</p>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                {{ Form::label('fecha') }}
                                <div class="input-group date">
                                    {{ Form::text('fecha', !empty($cita->fecha) ? $cita->fecha: '', ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'id'=>'inputFecha']) }}
                                    <div class="input-group-addon input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                </div>
                                {!! $errors->first('fecha', '<div class="invalid-feedback">:message</p>') !!}
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
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                {{ Form::label('hora') }}
                                <div class="input-group date">
                                    {{ Form::text('hora', $cita->hora, ['id'=>'hora', 'class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
                                    {!! $errors->first('hora', '<div class="invalid-feedback">:message</p>') !!}
                                            <div class="input-group-addon input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            </div>
                                        </div>    
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $("#hora").datetimepicker({
                                        format: 'HH:mm',
                                        stepping: 30
                                    });
                                });
                             </script>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>