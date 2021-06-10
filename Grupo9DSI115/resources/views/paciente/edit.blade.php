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
            <div class="col-md-12">

                @includeif('partials.errors')

                    <div class="card-header">
                        <span class="card-title">Actualizar paciente</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pacientes.update', $paciente->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('paciente.form')

                        </form>
                    </div>
            </div>
@endsection
