<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Examen</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <strong>Imagen:</strong>
                        @empty(!$examene->imagen)
                                <a href="/examenesImagenes/{{ $examene->imagen }}" target="_blank">
                                    <img name="imagenActual" src="/examenesImagenes/{{ $examene->imagen }}" class="mt-2 img-fluid">
                                </a>
                        @endempty
                        @empty($examene->imagen)
                            No hay imagen
                        @endempty
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
                        <strong>Consulta:</strong>
                        {{ $examene->consulta_id }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>