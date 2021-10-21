<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Imagen:</strong>
                        {{ $examene->imagen }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha:</strong>
                        {{ $examene->fecha }}
                    </div>
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $examene->descripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Consulta Id:</strong>
                        {{ $examene->consulta_id }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>