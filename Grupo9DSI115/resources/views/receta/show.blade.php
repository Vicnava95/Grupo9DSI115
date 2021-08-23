
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Receta</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Consulta:</strong>
                            {{ $receta->Consulta->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $receta->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $receta->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Proxima cita:</strong>
                            {{ $receta->proximaCita }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

