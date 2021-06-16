@extends("Base.base")

<!-- Titulo del head de la pagina-->
@section("tituloPagnia")

@endsection

<!-- Titulo para el cuerpo de la pagina web-->
@section("titulo")

@endsection

<!-- descripcion para el cuerpo de la pagina web-->
@section("descripcion")

@endsection

<!-- Agregar contenido de la pagina web-->
@section("cuerpo")
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __("Paciente") }}
                            </span>
                            <div class="float-right">

                            <a class="btn btn-primary float-right text-white" data-placement="left" 
                                data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                                data-attr="{{ route('pacientes.create') }}" title="Create a project"> 
                                Registrar paciente
                            </a>    

                            </div>
                            
                        </div>
                    </div>
                    @if ($message = Session::get("success"))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        {{-- <th>Dui</th> --}}
                                        <th>Telefonocasa</th>
                                        <th>Telefonocelular</th>
                                        {{-- <th>Fechadenacimiento</th>
										<th>Direccion</th>
										<th>Referenciapersonal</th>
										<th>Telreferenciapersonal</th>
										<th>Ocupacion</th>
										<th>Correoelectronico</th>
										<th>Sexo</th> --}}

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pacientes as $paciente)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $paciente->nombres }}</td>
                                            <td>{{ $paciente->apellidos }}</td>
                                            {{-- <td>{{ $paciente->dui }}</td> --}}
                                            <td>{{ $paciente->telefonoCasa }}</td>
                                            <td>{{ $paciente->telefonoCelular }}</td>
                                            {{-- <td>{{ $paciente->fechaDeNacimiento }}</td>
											<td>{{ $paciente->direccion }}</td>
											<td>{{ $paciente->referenciaPersonal }}</td>
											<td>{{ $paciente->telReferenciaPersonal }}</td>
											<td>{{ $paciente->ocupacion }}</td>
											<td>{{ $paciente->correoElectronico }}</td>
											<td>{{ $paciente->sexo->nombre }}</td> --}}

                                            <td>
                                                <form action="{{ route("pacientes.destroy", $paciente->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-secondary btn-sm btn-circle btn-circle-sm m-1"
                                                        id="mediumButton" data-toggle="modal" data-target="#mediumModal"
                                                        data-attr="{{ route("pacientes.show", $paciente->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1"
                                                        href="#" data-toggle="modal" data-target="#actualizarPacienteModal"
                                                        data-id="{{ $paciente->id }}"
                                                        data-nombres="{{ $paciente->nombres }}"
                                                        data-apellidos="{{ $paciente->apellidos}}"
                                                        data-dui="{{ $paciente->dui }}"
                                                        data-telefonocasa="{{ $paciente->telefonoCasa }}"
                                                        data-telefonocelular="{{$paciente->telefonoCelular }}"
                                                        data-fechadenacimiento="{{ $paciente->fechaDeNacimiento }}"
                                                        data-direccion="{{ $paciente->direccion }}"
                                                        data-referenciapersonal="{{ $paciente->referenciaPersonal }}"
                                                        data-telReferenciapersonal="{{$paciente->telReferenciaPersonal}}"
                                                        data-ocupacion="{{ $paciente->ocupacion }}"
                                                        data-correoelectronico={{ $paciente->correoElectronico }}
                                                        data-sexo={{ $paciente->sexo_id }} >
                                                        <i class="fa fa-fw fa-edit"></i>
                                                    </a>
                                                    
                                                        {{--<a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1"
                                                        href="{{ route("pacientes.show", $paciente->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a>--}}
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit"
                                                        class="btn btn-secondary btn-sm btn-circle btn-circle-sm m-1">
                                                        <i class="fa fa-fw fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pacientes->links() !!}
            </div>
        </div>
    </div>     


    <!-- Modal Registrar/Editar/Eliminar -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><-----></h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">

                        @includeif("partials.errors")

                            <div class="card-header">
                                <span class="card-title">Actualizar paciente</span>
                            </div>
                            <div class="card-body">
                                <form method="POST" id="formEdit" action="{{ route("pacientes.update",'') }}"  role="form" enctype="multipart/form-data">
                                    {{ method_field("PATCH") }}
                                    @csrf

                                    @include("paciente.form")
                                </form>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="formCreate" class="btn btn-primary" id="mostrar">Registrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Consultar paciente -->
    <div class="modal fade" id="actualizarPacienteModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Consultar paciente</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="formEdit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

<script>

    // display a modal (medium modal)
    $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            document.getElementById('mostrar').style.display = 'block';

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
                timeout: 8000
                
            })

            var letra = href.charAt(href.length-1);
            var b = document.getElementById('exampleModalLongTitle');

            if  (letra != 'e') {
                document.getElementById('mostrar').style.display = 'none';
            }

            switch(letra){
                case 'e':
                    b.innerHTML = "Registrar paciente" ;
                    break;
                
                case 't':
                    b.innerHTML = "Editar paciente" ;
                    break

                default:
                    b.innerHTML = "Mostrar paciente" ;
                    break
            }
            
        });

</script>

@endsection
