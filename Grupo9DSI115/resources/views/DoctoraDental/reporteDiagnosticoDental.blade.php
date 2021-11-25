
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
        <img src="{{ public_path().'/assets/img/Logo.png' }}" alt="Logo" height="40px">
        <h3>REPORTE CONSOLIDADO DE DIAGNOSTICO DENTAL DEL PACIENTE.</h3>
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
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
										<th>Celular</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Direccion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $paciente->nombres }}</td>
                                        <td>{{ $paciente->apellidos }}</td>
                                        <td>{{ $paciente->telefonoCelular  }}</td>
                                        <td>{{ $paciente->fechaDeNacimiento }}</td>
                                        <td>{{ $paciente->direccion }}</td>
                                    </tr>
                                        {{--
                                        @foreach ($citas as $cita)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{ $cita->nombres }} {{ $cita->apellidos  }}</td>
                                            <td>{{ $cita->fecha }}</td>
                                            <td>{{ $cita->hora }}</td>
                                            <td>{{ $cita->nombre }}</td>
                                            @if(Auth::user()->rols_fk==1||Auth::user()->rols_fk==4)
                                            <td>{{ $cita->nombrePersonas }} {{ $cita->apellidoPersonas }}</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                        --}}
                                </tbody>
                            </table>
                            <br>
                            <!--Tabla de dientes-->
                            <table>
                                <thead class="thead">
                                    <tr>
                                        <th>Cod Diente</th>
                                        <th>Descripción</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php $k=0; @endphp
                                    @for($i = 0; $i < 32; $i++)
                                    <tr>
                                        <td>{{ ++$k }}</td>
                                        <td>{{ $dientes[$i]->nombreDiente }}</td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                            <br>
                            <!--Tabla de tratamientos-->
                            <table>
                                <thead class="thead">
                                    <tr>
                                        <th>Cod Diente</th>
                                        <th>Tratamiento</th>
                                    </tr>
                                </thead>
                                <tbody>{{--
                                    @for($i = 0; $i < 32; $i++)
                                        @for($j = 0; $j < sizeof($tratamientos) - 1 ; $j++)
                                            @if($dientes[$i]->id == $tratamientos[$j]->diente_id)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $tratamientos[$j]->descripcion }}</td>
                                            </tr>
                                            @endif
                                        @endfor
                                    @endfor
                                    --}}
                                    <!-- Prueba -->
                                    @php $m=0; $n=1   @endphp
                                    @while($m <32)
                                        @for($j = 0; $j < sizeof($tratamientos) - 1 ; $j++)
                                            @if($dientes[$m]->id == $tratamientos[$j]->diente_id)
                                            <tr>
                                                <td>{{ $n }}</td>
                                                <td>{{ $tratamientos[$j]->descripcion }}</td>
                                            </tr>
                                            @endif
                                        @endfor
                                        @php $n++;
                                            $m++;
                                        @endphp
                                    @endwhile


                                </tbody>
                            </table>
                            <br>
                            <!--Tabla de recetas-->
                            <table>
                                <thead class="thead">
                                    <tr>
                                        <th>Receta</th>
                                        <th>Fecha de emision</th>
                                        <th>Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $l=0; @endphp
                                    @foreach($recetas as $receta)
                                    <tr>
                                        <td>{{ ++$l }}</td>
                                        <td>{{ $receta->fecha }}</td>
                                        <td>{{ $receta->descripcion }}</td>
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
