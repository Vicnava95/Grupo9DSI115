
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Consulta</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Paciente:</strong>
                            {{ $consulta->Paciente->apellidos }}, {{ $consulta->Paciente->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Doctor:</strong>
                            {{ $consulta->persona_id }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $consulta->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $consulta->fecha }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
