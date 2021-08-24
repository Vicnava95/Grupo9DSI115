@extends('Base.base')

@section('tituloPagnia')
    DASHBOARD DOCTOR GENERAL
@endsection

@section('titulo')
    DASHBOARD DOCTOR GENERAL
@endsection

@section('descripcion')
    
@endsection

@section('cuerpo')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12 col-12 d-flex justify-content-center align-items-center">
                    <form class="w-100 d-flex justify-content-center align-items-center" method="GET" action="{{ route('citasdg.index') }}">
                        <div class="container">
                            <div class="row">
                                <div class="form-group col-md-5 col-12">
                                    <label for="fechaInicio">Fecha de inicio</label>
                                    <div class='input-group date'>
                                        <input type='text' class="form-control" id='fechaInicio' name='fechaInicio'/>
                                        <div class="input-group-addon input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label for="fechaFin">Fecha de fin</label>
                                    <div class='input-group date'>
                                        <input type='text' class="form-control" id='fechaFin' name='fechaFin'/>
                                        <div class="input-group-addon input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 col-12 d-flex justify-content-center align-items-end">
                                    <input class="btn btn-primary" type="submit" value="Consultar fechas">
                                    
                                </div>
                            </div> 
                        </div>
                    </form>
                </div>
                
                <script type="text/javascript">
                    $(function () {
                        $('#fechaInicio').datetimepicker({
                            format: 'YYYY/MM/DD',
                        });
                        $('#fechaFin').datetimepicker({
                            useCurrent: false,
                            format: 'YYYY/MM/DD', //Important! See issue #1075
                    });
                        $("#fechaInicio").on("dp.change", function (e) {
                            $('#fechaFin').data("DateTimePicker").minDate(e.date);
                        });
                        $("#fechaFin").on("dp.change", function (e) {
                            $('#fechaInicio').data("DateTimePicker").maxDate(e.date);
                        });
                    });
                </script>
            </div>
            <div class="row">
                <div class="col-md-6 col-12 p-1 d-flex justify-content-center align-items-end">
                    <a class="btn btn-primary" id="mediumButton" href="#" role="button" data-toggle="modal" data-target="#mediumModal"
                    data-attr="{{ route('citas.create') }}">Crear Cita</a>
                </div>
                <div class="col-md-6 col-12 p-1 d-flex justify-content-center align-items-end">
                    <a class="btn btn-primary" id="mediumButton" href="#" role="button" data-toggle="modal" data-target="#mediumModal"
                    data-attr="{{ route('pacientes.create') }}">Crear paciente</a>
                </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($fechaInicio && $fechaFin)
                <h2 class="text-center">Citas programadas entre las fechas: {{ $fechaInicio }} - {{ $fechaFin }}</h2>
                @if (count($citas)<=0)
                    <h2 class="text-center">No hay citas programadas</h2>
                @endif
            @elseif (count($citas)<=0)
                <h2 class="text-center">No hay citas programadas</h2>
            @else
                <h2 class="text-center">Citas programadas para este dia</h2>
            @endif
            <div class="row mt-4">
                <div class="col-12">

                    @foreach ($citas as $cita)
                    <div class="bg-dark2 rounded mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center" id="headingOne">
                            <h3 class="mb-0 d-block">
                                <a class="btn btn-link text-white" id="mediumButton" href="#" role="button" .createdata-toggle="modal" data-target="#mediumModal" data-attr="{{ route('consultasByDashboard.create', $cita) }}">
                                    {{$cita->Paciente->apellidos}}, {{$cita->Paciente->nombres}}
                                    <i class="fa fa-calendar text-white ml-5 mr-1"></i> {{$cita->fecha}} 
                                    <i class="fa fa-clock text-white ml-5 mr-1"></i> {{$cita->hora}}
                                </a>
                            </h3>
                            <button class="btn btn-link text-left collapsed text-white-50" type="button" data-toggle="collapse" data-target="#collapse{{ $cita->id }}" aria-expanded="false" aria-controls="collapse{{ $cita->id }}">
                                <i class="fas fa-arrow-down text-white"></i>
                            </button>
                            
                        </div>
                        <div id="collapse{{ $cita->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <select name="" id="">
                                    <option>Finalizada</option>
                                    <option>Cancelada</option>
                                    <option>Reprogramada</option>
                                </select>
                                <input type="submit" value="Enviar">
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Targeta -->
                        
                    
                    

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Registrar/Editar/Eliminar -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <---Titulo--->
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" form="formCreate" class="btn btn-primary" id="registrar">Registrar</button>
                    <!--<button type="submit" form="formEdit" class="btn btn-primary" id="editar">Editar</button>
                    <button type="submit" form="formDelete" class="btn btn-danger" id="eliminar">Eliminar</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- modal de mensaje correto-->
    @if ($message = Session::get('success'))
        <div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-body py-5">
                    @if ($message = Session::get('success'))
                        <img class='w-25 mx-auto mb-3 d-block' src="{{asset('assets/img/check.svg')}}"/>
                        <p class="text-white text-center">{{ $message }}</p>
                        <script type="text/javascript">
                            $('#modalSuccess').modal('show');
                            setTimeout(function(){
                                $('#modalSuccess').modal('hide')
                            }, 5000);
                        </script>
                    @endif
                </div>
            </div>
            </div>
        </div>
    @endif


    <script>
        

        @if (count($errors) > 0)

            let href=localStorage.getItem('formulario');
            mostrarModal(href)
                setTimeout(function(){
                @foreach ($errors->getMessages() as $key => $value)
                    @error($key)
                        $("[name='{{$key}}']").addClass('is-invalid').parent().append('<div class="invalid-feedback"><p>{{$message}}</p></div>')
                    @enderror
                    $("[name='{{$key}}']").val('{{ old($key) }}');
                @endforeach
            },500);
        @endif

        
        
        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            mostrarModal(href)
            localStorage.setItem('formulario', href);
        });

        function mostrarModal(href) {
            /*document.getElementById('registrar').style.display = 'block';
            document.getElementById('editar').style.display = 'block';
            document.getElementById('eliminar').style.display = 'block';*/
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 0

            })

            var letra = href.charAt(href.length - 1);
            var b = document.getElementById('exampleModalLongTitle').innerHTML = "Registrar";
        }
    </script>
@endsection