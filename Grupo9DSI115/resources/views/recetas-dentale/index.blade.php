@extends("Base.base")

<!-- Titulo del head de la pagina-->
@section('tituloPagnia')
Recetas Dentales
@endsection

<!-- Titulo para el cuerpo de la pagina web-->
@section('titulo')
Recetas Dentales
@endsection

<!-- descripcion para el cuerpo de la pagina web-->
@section('descripcion')

@endsection

@section('cuerpo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                Recetas Dentales
                            </span>
                             {{-- <div class="float-right ml-5">
                                <a class="btn btn-primary float-right text-white" data-placement="left" data-toggle="modal" id="mediumButton"
                                    data-target="#mediumModal" data-attr="{{ route('rDentales.create') }}" title="Create a project">
                                    Registrar receta
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
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
                                        <th>Paciente</th>
										<th>Descripción</th>
										<th>Fecha</th>
										{{-- <th>Proxima Cita</th> --}}
										<th>Estado</th>
                                        <th>Doctora</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recetasDentales as $recetasDentale)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            @foreach ($expedientes as $expediente)
                                                @if ($expediente->id == $recetasDentale->expedienteDental_id)
                                                    @foreach ($pacientes as $paciente)
                                                        @if ($expediente->paciente_id == $paciente->id)
                                                            <td>{{ $paciente->nombres}}{{$paciente->apellidos}}</td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
											<td>{{ $recetasDentale->descripcion }}</td>
											<td>{{ $recetasDentale->fecha }}</td>
											{{-- <td>{{ $recetasDentale->proximaCita }}</td> --}}
											<td>{{ $recetasDentale->estadoReceta->nombre  }}</td>
                                            <td>Sandra Coto</td>
                                            <td>
                                                <a class="btn btn-secondary btn-sm btn-circle btn-circle-sm m-1" id="mediumButton" data-toggle="modal"
                                                data-target="#mediumModal" data-attr="{{ route('rDentales.show',$recetasDentale->id) }}">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                {{-- <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1" id="mediumButton" data-toggle="modal"
                                                    data-target="#mediumModal" data-attr="{{ route('rDentales.edit',$recetasDentale->id) }}">
                                                    <i class="fa fa-fw fa-edit"></i>
                                                </a> --}}
                                                <a class="btn btn-sm btn-danger btn-circle btn-circle-sm m-1" id="mediumButton" data-toggle="modal"
                                                    data-target="#mediumModal" data-attr="{{route('rDentales.delete',$recetasDentale)}}">
                                                    <i class="fa fa-fw fa-trash"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $recetasDentales->links() !!}
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
                    <button type="submit" form="formEdit" class="btn btn-primary" id="editar">Editar</button>
                    <button type="submit" form="formDelete" class="btn btn-danger" id="eliminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        @if (count($errors) > 0)
                let href=localStorage.getItem('formulario');
                mostrarModal(href)
                    setTimeout(function(){
                    @foreach ($receta->getAttributes() as $key => $value)
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
                document.getElementById('registrar').style.display = 'block';
                document.getElementById('editar').style.display = 'block';
                document.getElementById('eliminar').style.display = 'block';
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
                var b = document.getElementById('exampleModalLongTitle');

                if (letra != 'e') {
                    document.getElementById('registrar').style.display = 'none';
                }

                if (letra != 't') {
                    document.getElementById('editar').style.display = 'none';
                }

                if (letra != 'r') {
                    document.getElementById('eliminar').style.display = 'none';
                }

                switch (letra) {
                    case 'e':
                        b.innerHTML = "Registrar receta";
                        break;

                    case 't':
                        b.innerHTML = "Editar receta";
                        break;

                    case 'r':
                        b.innerHTML = "Eliminar receta";
                        break;

                    default:
                        b.innerHTML = "Mostrar receta";
                        break;
                }
            }
    </script>
@endsection
