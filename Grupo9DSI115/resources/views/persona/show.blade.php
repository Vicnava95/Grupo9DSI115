@extends('layouts.app')

@section('template_title')
    {{ $persona->name ?? 'Show Persona' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Persona</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('personas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombrepersonas:</strong>
                            {{ $persona->nombrePersonas }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidopersonas:</strong>
                            {{ $persona->apellidoPersonas }}
                        </div>
                        <div class="form-group">
                            <strong>Dui:</strong>
                            {{ $persona->dui }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $persona->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Fechadenacimiento:</strong>
                            {{ $persona->fechaDeNacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Nitpersona:</strong>
                            {{ $persona->nitPersona }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo Id:</strong>
                            @foreach ($sexos as $sexo)
                                @if ($sexo->id == $persona->sexo_id)
                                    {{ $sexo->nombre }}
                                @endif 
                            @endforeach
                        </div>
                        <div class="form-group">
                            <strong>Rolpersona Id:</strong>
                            @foreach ($roles as $rol)
                                @if ($rol->id == $persona->rolpersona_id)
                                    <td>{{ $rol->nombreRolPersona }}</td>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
