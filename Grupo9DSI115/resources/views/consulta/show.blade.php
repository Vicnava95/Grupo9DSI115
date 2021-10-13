
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Consulta</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $consulta->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Paciente:</strong>
                            {{ $consulta->Paciente->apellidos }}, {{ $consulta->Paciente->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Peso del paciente:</strong>
                            {{ $consulta->peso }}
                        </div>
                        <div class="form-group">
                            <strong>Presión arterial del paciente:</strong>
                            {{ $consulta->presion }}
                        </div>
                        <div class="form-group">
                            <strong>Temperatura del paciente:</strong>
                            {{ $consulta->temperatura }}
                        </div>
                        <div class="form-group">
                            <strong>Frecuencia cardiaca del paciente:</strong>
                            {{ $consulta->frecuencia_cardiaca }}
                        </div>
                        <div class="form-group">
                            <strong>Frecuencia respiratoria del paciente:</strong>
                            {{ $consulta->frecuencia_respiratoria }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $consulta->descripcion }}
                        </div>

                        <div class="form-group">
                            <strong>Doctor:</strong>
                            {{ $consulta->Persona->apellidoPersonas }}, {{ $consulta->Persona->nombrePersonas }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
