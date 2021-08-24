@extends('Base.base')

@section('tituloPagnia')
    DASHBOARD DOCTOR GENERAL
@endsection

@section('titulo')
    DASHBOARD DOCTOR GENERAL
@endsection

@section('descripcion')
    
@endsection

@section('cuerpo')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">
                    <a class="btn btn-primary" href="#" role="button">Crear paciente</a>
                </div>
                <div class="col-md-8 col-12 d-flex justify-content-center align-items-center">

                    <form class="w-100 d-flex justify-content-center align-items-center" method="POST" id="formEdit" action="" role="form" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="fechaInicio">Fecha de inicio</label>
                                    <div class='input-group date'>
                                        <input type='text' class="form-control" id='fechaInicio' name='fechaInicio'/>
                                        <div class="input-group-addon input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="fechaFin">Fecha de fin</label>
                                    <div class='input-group date'>
                                        <input type='text' class="form-control" id='fechaFin' name='fechaFin'/>
                                        <div class="input-group-addon input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 d-flex justify-content-center align-items-center">
                                    <a class="btn btn-primary" href="#" role="button">Consultar fechas</a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">
                    <a class="btn btn-primary" href="#" role="button">Crear paciente</a>
                </div>
                
                <script type="text/javascript">
                    $(function () {
                        $('#fechaInicio').datetimepicker({
                            format: 'YYYY/MM/DD',
                        });
                        $('#fechaFin').datetimepicker({
                            useCurrent: false,
                            format: 'YYYY/MM/DD', //Important! See issue #1075
                    });
                        $("#fechaInicio").on("dp.change", function (e) {
                            $('#fechaFin').data("DateTimePicker").minDate(e.date);
                        });
                        $("#fechaFin").on("dp.change", function (e) {
                            $('#fechaInicio').data("DateTimePicker").maxDate(e.date);
                        });
                    });
                </script>
            </div>
        </div>
        <div class="card-body">
            <h2 class="text-center">Citas programadas para este dia</h2>
            <div class="row mt-4">
                <div class="col-12">

                    <div class="bg-dark rounded mb-4">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed text-white-50" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Collapsible Group Item #1
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                            </div>
                        </div>
                    </div>    
                    
                    <div class="bg-dark rounded mb-4">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed text-white-50" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                                    Collapsible Group Item #2
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection