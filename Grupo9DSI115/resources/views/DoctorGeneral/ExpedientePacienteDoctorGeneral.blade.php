@extends('Base.base')

@section('tituloPagnia')
    Expediente NombrePaciente
@endsection

@section('titulo')
    Expediente NombrePaciente
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
                            
                            <div class="text-center">
                                <h2>Fecha de la cita</h2>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 col-12 d-flex justify-content-center align-items-end">
                                    <a class="btn btn-primary" id="mediumButton" href="#" role="button" data-toggle="modal" data-target="#mediumModal" 
                                    data-attr="{{ route('citas.create') }}">Tratamientos</a>
                                </div>
                                <div class="form-group col-md-3 col-12 d-flex justify-content-center align-items-end">
                                    <a class="btn btn-primary" id="mediumButton" href="#" role="button" data-toggle="modal" data-target="#mediumModal" 
                                    data-attr="{{ route('citas.create') }}">Crear Cita</a>
                                </div>
                                <div class="form-group col-md-3 col-12 d-flex justify-content-center align-items-end">
                                    <a class="btn btn-primary" id="mediumButton" href="#" role="button" data-toggle="modal" data-target="#mediumModal" 
                                    data-attr="{{ route('citas.create') }}">Recetas</a>
                                </div>
                                <div class="form-group col-md-3 col-12 d-flex justify-content-center align-items-end">
                                    <a class="btn btn-primary" id="mediumButton" href="#" role="button" data-toggle="modal" data-target="#mediumModal" 
                                    data-attr="{{ route('citas.create') }}">Pagos</a>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body" >
        <h2 class="text">Información personal</h2>
        <div class="card">
            <div class="container">
                
                <div class="row">
                    <div class="form-group col-md-6 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Nombre:</label>
                    </div>
                    <div class="form-group col-md-3 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Apellido:</label>
                    </div>
                    </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Celular:</label>
                    </div>
                    <div class="form-group col-md-3 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Fecha de nacimiento:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Dirección:</label>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text">Detalles de la consulta (Actual)</h2>
        <div class="card">
            <div class="container">
                
                <div class="row">
                    <div class="form-group col-md-4 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Fecha:</label>
                    </div>
                    <div class="form-group col-md-4 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Presión:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Tipo:</label>
                    </div>
                </div>
                
                <label class="text">Detalle:</label>
                <div class="bg-dark p-4 mb-4">
                        <div class="row">
                            <div class="col-12">
                                Descripcion: Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae ea amet doloribus error dicta voluptate, porro rerum voluptatum exercitationem modi praesentium ex molestias harum. Alias ea tempore vel blanditiis voluptatibus!
                            </div>
                        </div>
                </div>
                
                    <!-- <div class="col-lg-12">
                        <textarea name="contenido" id="contenido" class="form-control" rows="4" placeholder="Detalles consulta actual" ></textarea>
                    </div> -->
                
            </div>
        </div>

        <h2 class="text">Detalle de las citas</h2>
        <div class="card">
            <div class="form-group col-md-4 col-12 d-flex justify-content align-items-end">
                <label class="text-center">Cantidad de citas: 35</label>
            </div>
            <div class=" p-4 mb-4">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Descripción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>27/08/2021</td>
                                    <td>Limpieza</td>
                                    <td>Muy dañado necesita otra</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>27/08/2021</td>
                                    <td>Relleno</td>
                                    <td>En la pieza 18</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>27/08/2021</td>
                                    <td>Extracción</td>
                                    <td>Cordal superior</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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