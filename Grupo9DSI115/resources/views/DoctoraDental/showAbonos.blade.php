<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Abonos</span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                            <tr>
                                <th>Monto</th>
                                <th>Fecha</th>
                            </tr>
                            @foreach ($abonos as $abono)
                                <tr>
                                    <th>${{ $abono->monto }}</th>
                                    <th>{{ $abono->fecha }}</th>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
