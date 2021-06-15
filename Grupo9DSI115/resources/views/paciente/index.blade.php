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
                                <a href="{{ route("pacientes.create") }}" class="btn btn-primary float-right text-white"
                                    data-placement="left" data-toggle="modal" data-target="#registrarPacienteModal">
                                    Registrar paciente
                                </a>
                            </div>
                            <!--
                                 <div class="float-right">
                                    <a href="{{ route("pacientes.create") }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                      {{ __("Create New") }}
                                    </a>
                                  </div> -->
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
                                                    <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1"
                                                        href="{{ route("pacientes.show", $paciente->id) }}"><i class="fa fa-fw fa-eye"></i>
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
                                                        class="btn btn-secondary btn-sm btn-circle btn-circle-sm m-1"><i
                                                            class="fa fa-fw fa-trash"></i></button>
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

    <!-- Modal registrar paciente -->
    <div class="modal fade" id="registrarPacienteModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Registrar paciente</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include("paciente.create", ["paciente"=>App\Models\Paciente::class])
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="formCreate" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal actualizar paciente -->
    <div class="modal fade" id="actualizarPacienteModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Actualizar paciente</h5>
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
                    <button type="submit" form="formEdit" class="btn btn-primary">Actualizar</button>
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
    $("#actualizarPacienteModal").on("shown.bs.modal", function (event) {
        //obetener el los data- de actualizar <a/>
        var boton = $(event.relatedTarget)
        //oebetenr los data-
        var id = boton.data("id")
        var nombres = boton.data("nombres")
        var apellidos = boton.data("apellidos")
        var dui = boton.data("dui")
        var telefonoCasa = boton.data("telefonocasa")
        var telefonoCelular = boton.data("telefonocelular")
        var fechaDeNacimiento = boton.data("fechadenacimiento")
        var direccion = boton.data("direccion")
        var referenciaPersonal = boton.data("referenciapersonal")
        var telReferenciaPersonal = boton.data("telreferenciapersonal")
        var ocupacion = boton.data("ocupacion")
        var correoElectronico = boton.data("correoelectronico")
        var sexo = boton.data("sexo")
        console.log({{$paciente->id}})
        $('#formEdit').attr('action', "{{ route("pacientes.update",'') }}"+"/"+id);
        //obtener modal actual
        var modal = $(this)
        modal.find("input[name=nombres]").val(nombres)
        modal.find("input[name=apellidos]").val(apellidos)
        modal.find("input[name=dui]").val(dui)
        modal.find("input[name=telefonoCasa]").val(telefonoCasa)
        modal.find("input[name=telefonoCelular]").val(telefonoCelular)
        modal.find("input[name=fechaDeNacimiento]").val(fechaDeNacimiento)
        modal.find("input[name=direccion]").val(direccion)
        modal.find("input[name=referenciaPersonal]").val(referenciaPersonal)
        modal.find("input[name=telReferenciaPersonal]").val(telReferenciaPersonal)
        modal.find("input[name=ocupacion]").val(ocupacion)
        modal.find("input[name=correoElectronico]").val(correoElectronico)
        if(sexo==1) modal.find("input[name=sexo_id]")[0].checked = true
        else modal.find("input[name=sexo_id]")[1].checked = true
    })
</script>

@endsection
