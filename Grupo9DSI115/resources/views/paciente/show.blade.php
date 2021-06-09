@extends('layouts.app')

@section('template_title')
    {{ $paciente->name ?? 'Show Paciente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Paciente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pacientes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $paciente->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $paciente->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Dui:</strong>
                            {{ $paciente->dui }}
                        </div>
                        <div class="form-group">
                            <strong>Telefonocasa:</strong>
                            {{ $paciente->telefonoCasa }}
                        </div>
                        <div class="form-group">
                            <strong>Telefonocelular:</strong>
                            {{ $paciente->telefonoCelular }}
                        </div>
                        <div class="form-group">
                            <strong>Fechadenacimiento:</strong>
                            {{ $paciente->fechaDeNacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $paciente->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Referenciapersonal:</strong>
                            {{ $paciente->referenciaPersonal }}
                        </div>
                        <div class="form-group">
                            <strong>Telreferenciapersonal:</strong>
                            {{ $paciente->telReferenciaPersonal }}
                        </div>
                        <div class="form-group">
                            <strong>Ocupacion:</strong>
                            {{ $paciente->ocupacion }}
                        </div>
                        <div class="form-group">
                            <strong>Correoelectronico:</strong>
                            {{ $paciente->correoElectronico }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo Id:</strong>
                            {{ $paciente->sexo_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
