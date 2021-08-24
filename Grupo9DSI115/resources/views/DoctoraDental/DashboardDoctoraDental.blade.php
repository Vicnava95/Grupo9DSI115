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
                <div class="col-md-12 col-12 d-flex justify-content-center align-items-center">

                    <form class="w-100 d-flex justify-content-center align-items-center" method="POST" id="formEdit" action="" role="form" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                <div class="form-group col-md-5 col-12">
                                    <label for="fechaInicio">Fecha de inicio</label>
                                    <div class='input-group date'>
                                        <input type='text' class="form-control" id='fechaInicio' name='fechaInicio'/>
                                        <div class="input-group-addon input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label for="fechaFin">Fecha de fin</label>
                                    <div class='input-group date'>
                                        <input type='text' class="form-control" id='fechaFin' name='fechaFin'/>
                                        <div class="input-group-addon input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 col-12 d-flex justify-content-center align-items-end">
                                    <a class="btn btn-primary " href="#" role="button">Consultar fechas</a>
                                </div>
                            </div> 
                        </div>
                    </form>
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
            <div class="row">
                <div class="col-md-6 col-12 p-1 d-flex justify-content-center align-items-end">
                    <a class="btn btn-primary" href="#" role="button">Crear paciente</a>
                </div>
                <div class="col-md-6 col-12 p-1 d-flex justify-content-center align-items-end">
                    <a class="btn btn-primary" href="#" role="button">Crear paciente</a>
                </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h2 class="text-center">Citas programadas para este dia</h2>
            <div class="row mt-4">
                <div class="col-12">

                    <!-- Targeta -->
                    <div class="bg-dark rounded mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center" id="headingOne">
                            <h3 class="mb-0 d-block">
                                <a href="" class="btn btn-link text-white">Mario neta</a>
                            </h3>
                            <button class="btn btn-link text-left collapsed text-white-50" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                <i class="fas fa-arrow-down text-white"></i>
                            </button>
                            
                        </div>
                        <div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                            </div>
                        </div>
                    </div>    
                    
                    <div class="bg-dark rounded mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center" id="headingOne">
                            <h3 class="mb-0 d-block">
                                <a href="" class="btn btn-link text-white">Mario neta</a>
                            </h3>
                            <button class="btn btn-link text-left collapsed text-white-50" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                <i class="fas fa-arrow-down text-white"></i>
                            </button>
                            
                        </div>
                        <div id="collapse2" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                            </div>
                        </div>
                    </div>  
                    
                    <div class="bg-dark rounded mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center" id="headingOne">
                            <h3 class="mb-0 d-block">
                                <a href="" class="btn btn-link text-white">Mario neta</a>
                            </h3>
                            <button class="btn btn-link text-left collapsed text-white-50" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                <i class="fas fa-arrow-down text-white"></i>
                            </button>
                            
                        </div>
                        <div id="collapse3" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                            </div>
                        </div>
                    </div>    
                    
                    <div class="bg-dark rounded mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center" id="headingOne">
                            <h3 class="mb-0 d-block">
                                <a href="" class="btn btn-link text-white">Mario neta</a>
                            </h3>
                            <button class="btn btn-link text-left collapsed text-white-50" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                <i class="fas fa-arrow-down text-white"></i>
                            </button>
                            
                        </div>
                        <div id="collapse4" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
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