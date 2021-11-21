<style>
    table{
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%
    }

    h3{
        font-family: arial, sans-serif;
        border-collapse: collapse;
        text-align: center;
    }

    td, th{
        border: 1px solid #dddddd;
        text-align: left;
    }

    tr:nth-child(even){
        background-color:#dddddd;
    }
</style>
    <div class="container-fluid">
        <h3>REPORTE DE RECETAS Y PRÓXIMAS CITAS</h3>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table>
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Descripción</th>
                                        <th>Fecha emisión</th>
										<th>Próxima cita</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($recetas as $receta)
                                        <tr>
                                            <td>{{++$i}}</td> 
                                            <td>{{ $receta->descripcion }}</td> 
                                            <td>{{ $receta->fecha }}</td> 
                                            <td>{{ $receta->proximaCita }}</td> 
                                        </tr>
                                        @endforeach    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>