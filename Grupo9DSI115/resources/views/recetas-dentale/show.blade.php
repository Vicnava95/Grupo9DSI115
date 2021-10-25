
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Show Recetas Dentale</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('rDentales.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{-- {{ $recetasDentale->descripcion }} --}}
                    </div>
                    <div class="form-group">
                        <strong>Fecha:</strong>
                        {{-- {{ $recetasDentale->fecha }} --}}
                    </div>
                    <div class="form-group">
                        <strong>Proximacita:</strong>
                        {{-- {{ $recetasDentale->proximaCita }} --}}
                    </div>
                    <div class="form-group">
                        <strong>Expedientedental Id:</strong>
                        {{-- {{ $recetasDentale->expedienteDental_id }} --}}
                    </div>
                    <div class="form-group">
                        <strong>Estadoreceta Id:</strong>
                        {{-- {{ $recetasDentale->estadoReceta_id }} --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

