@extends('Base.base')

@section('tituloPagnia')
    Expediente {{$paciente->nombres}}
@endsection

@section('titulo')
    <a href="{{route('dshDoctorDental.index')}}"><i class="fas fa-chevron-circle-left"></i></a>    
    <br>
    Expediente Clínico de: {{$paciente->nombres}} {{$paciente->apellidos}}
@endsection

@section('descripcion')
    
@endsection

@section('cuerpo')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12 col-12 d-flex justify-content-center align-items-center">
                    
                        <div class="container">
                            
                            <div class="text-center">
                                <h2>{{$citaPaciente->fecha}}</h2>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 col-12 d-flex justify-content-center align-items-end">
                                    <a class="btn btn-primary disabled" id="mediumButton" href="#" role="button" data-toggle="modal" data-target="#mediumModal" 
                                    data-attr="{{ route('citas.create') }}">Tratamientos</a>
                                </div>
                                <div class="form-group col-md-3 col-12 d-flex justify-content-center align-items-end">
                                    <a class="btn btn-primary" id="mediumButton" href="#" role="button" data-toggle="modal" data-target="#mediumModal" 
                                    data-attr="{{ route('crearCitaDoctoraDental',$citaPaciente->paciente_id) }}">Crear Cita</a>
                                </div>
                                <div class="form-group col-md-3 col-12 d-flex justify-content-center align-items-end">
                                    <a class="btn btn-primary" id="mediumButton" href="#" role="button" data-toggle="modal" data-target="#mediumModal" 
                                    data-attr="{{ route('citas.create') }}">Recetas</a>
                                </div>
                                <div class="form-group col-md-3 col-12 d-flex justify-content-center align-items-end">
                                    <a class="btn btn-primary disabled" id="mediumButton" href="#" role="button" data-toggle="modal" data-target="#mediumModal" 
                                    data-attr="{{ route('citas.create') }}">Pagos</a>
                                </div>
                                
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="card-body" >
        <h2 class="text">Información personal</h2>
        <div class="card">
            <div class="container">
                
                <div class="row" style="margin-top:10px;">
                    <div class="form-group col-md-6 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Nombre: {{$paciente->nombres}}</label>
                    </div>
                    <div class="form-group col-md-3 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Apellido: {{$paciente->apellidos}}</label>
                    </div>
                    </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Celular: {{$paciente->telefonoCelular}}</label>
                    </div>
                    <div class="form-group col-md-3 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Fecha de nacimiento: {{$paciente->fechaDeNacimiento}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Dirección: {{$paciente->direccion}}</label>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text">Detalles de la consulta (Actual)</h2>
        {{-- Formulario para crear una consulta --}}
        <form  method="POST" action="{{route('crearConsultaDoctora')}}">
            @csrf
            <div class="card">
                <div class="container">
                    <br>
                    <label class="text">Detalle:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required name="descripcionConsulta" maxlength="250"></textarea>              
                </div>
                <div class="row container">
                    <input type="text" name="idPaciente" value="{{$citaPaciente->paciente_id}}" hidden>
                    <input type="text" name="idPersona" value="{{$citaPaciente->persona_id}}" hidden>
                    <input type="text" name="fechaConsulta" value="{{$citaPaciente->fecha}}" hidden>
                    <input type="text" name="idCita" value="{{$citaPaciente->id}}" hidden>
                    <button class="btn btn-primary" type="submit" style="margin:15px;">Crear consulta</button>
                </div>
            </div>
        </form>

        <h2 class="text">Detalle de las consultas</h2>
        <div class="card">
            <div class="form-group col-md-4 col-12 d-flex justify-content align-items-end" style="margin-top:10px;">
                <label class="text-center">Cantidad de citas: {{$cantidadConsultas}}</label>
            </div>
            @if ($cantidadConsultas == 0)
                <div class=" p-4 mb-4">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3>No hay consultas registradas</h3>
                        </div>
                    </div>
                </div>
            @else
                <div class=" p-4 mb-4">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Receta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collecionConsultas as $collecionConsulta)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>{{$collecionConsulta['fecha']}}</td>
                                        <td>{{$collecionConsulta['descripcion']}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1" id="mediumButton" data-toggle="modal"
                                                    data-target="#mediumModal" data-attr="{{ route('crearRecetaExpedienteDental',$collecionConsulta['id']) }}">
                                                    <i class="fas fa-file-medical-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
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