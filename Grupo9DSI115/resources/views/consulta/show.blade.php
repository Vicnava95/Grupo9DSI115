@extends('layouts.app')

@section('template_title')
    {{ $consulta->name ?? 'Show Consulta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Consulta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('consultas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $consulta->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $consulta->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Paciente Id:</strong>
                            {{ $consulta->paciente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Persona Id:</strong>
                            {{ $consulta->persona_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
