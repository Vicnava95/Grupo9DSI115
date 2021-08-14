@extends('layouts.app')

@section('template_title')
    {{ $cita->name ?? 'Show Cita' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cita</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('citas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $cita->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $cita->hora }}
                        </div>
                        <div class="form-group">
                            <strong>Paciente Id:</strong>
                            {{ $cita->paciente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Persona Id:</strong>
                            {{ $cita->persona_id }}
                        </div>
                        <div class="form-group">
                            <strong>Estadocita Id:</strong>
                            {{ $cita->estadoCita_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
