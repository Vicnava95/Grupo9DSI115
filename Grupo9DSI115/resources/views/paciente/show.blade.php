@extends('Base.base')

<!-- Titulo del head de la pagina-->
@section('tituloPagnia')
    Paciente
@endsection

<!-- Titulo para el cuerpo de la pagina web-->
@section('titulo')
    Paciente
@endsection

<!-- descripcion para el cuerpo de la pagina web-->
@section('descripcion')
    
@endsection

<!-- Agregar contenido de la pagina web-->
@section('cuerpo')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!--<div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Paciente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pacientes.index') }}"> Back</a>
                        </div>
                    </div>-->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <strong>Nombres:</strong>
                                    {{ $paciente->nombres }}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <strong>Apellidos:</strong>
                                    {{ $paciente->apellidos }}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <strong>Dui:</strong>
                                    {{ $paciente->dui }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <strong>Telefono de casa:</strong>
                                    {{ $paciente->telefonoCasa }}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <strong>Telefono celular:</strong>
                                    {{ $paciente->telefonoCelular }}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <strong>Fecha de nacimiento:</strong>
                                    {{ $paciente->fechaDeNacimiento }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <strong>Direccion:</strong>
                                    {{ $paciente->direccion }}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <strong>Referencia personal:</strong>
                                    {{ $paciente->referenciaPersonal }}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <strong>Telefono de referencia personal:</strong>
                                    {{ $paciente->telReferenciaPersonal }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <strong>Ocupacion:</strong>
                                    {{ $paciente->ocupacion }}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <strong>Correoe lectronico:</strong>
                                    {{ $paciente->correoElectronico }}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <strong>Sexo:</strong>
                                    {{ $paciente->Sexo->nombre }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
