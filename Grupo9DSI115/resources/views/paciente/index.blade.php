@extends('Base.base')

<!-- Titulo del head de la pagina-->
@section('tituloPagnia')
    
@endsection

<!-- Titulo para el cuerpo de la pagina web-->
@section('titulo')
    
@endsection

<!-- descripcion para el cuerpo de la pagina web-->
@section('descripcion')
    
@endsection

<!-- Agregar contenido de la pagina web-->
@section('cuerpo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Paciente') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('pacientes.create') }}" class="btn btn-primary float-right text-white"  data-placement="left" data-toggle="modal" data-target="#registrarPacienteModal">
                                  Registrar paciente
                                </a>
                              </div>
                              <!--
                             <div class="float-right">
                                <a href="{{ route('pacientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div> -->
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
                                        
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Dui</th>
										<th>Telefonocasa</th>
										<th>Telefonocelular</th>
										<th>Fechadenacimiento</th>
										<th>Direccion</th>
										<th>Referenciapersonal</th>
										<th>Telreferenciapersonal</th>
										<th>Ocupacion</th>
										<th>Correoelectronico</th>
										<th>Sexo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pacientes as $paciente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $paciente->nombres }}</td>
											<td>{{ $paciente->apellidos }}</td>
											<td>{{ $paciente->dui }}</td>
											<td>{{ $paciente->telefonoCasa }}</td>
											<td>{{ $paciente->telefonoCelular }}</td>
											<td>{{ $paciente->fechaDeNacimiento }}</td>
											<td>{{ $paciente->direccion }}</td>
											<td>{{ $paciente->referenciaPersonal }}</td>
											<td>{{ $paciente->telReferenciaPersonal }}</td>
											<td>{{ $paciente->ocupacion }}</td>
											<td>{{ $paciente->correoElectronico }}</td>
											<td>{{ $paciente->sexo->nombre }}</td>

                                            <td>
                                                <form action="{{ route('pacientes.destroy',$paciente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pacientes.show',$paciente->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pacientes.edit',$paciente->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
    <div class="modal fade" id="registrarPacienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content bg-dark">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Registrar paciente</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                @include('paciente.create', ['paciente'=>App\Models\Paciente::class])
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
@endsection
