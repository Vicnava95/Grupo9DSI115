<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <strong>Expediente Doctora Dental Id:</strong>
                                {{ $pago->expediente_doctora_dental_id }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <strong>Estado Pago Id:</strong>
                                {{ $pago->estado_pago_id }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <strong>Costo:</strong>
                                {{ $pago->costo }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <strong>Fecha:</strong>
                                {{ $pago->fecha }}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <strong>Descripcion:</strong>
                                {{ $pago->descripcion }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
