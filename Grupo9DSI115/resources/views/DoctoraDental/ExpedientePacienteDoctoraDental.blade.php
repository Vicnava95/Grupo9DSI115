@extends('Base.base')

@section('tituloPagnia')
    Expediente {{$paciente->nombres}}
@endsection

@section('titulo')
    <a href="{{route('dshDoctorDental.index')}}"><i class="fas fa-chevron-circle-left"></i></a>    
    <br>
    Expediente Clínico de: {{$paciente->nombres}} {{$paciente->apellidos}}
@endsection

@section('descripcion')
    
@endsection

@section('cuerpo')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12 col-12 d-flex justify-content-center align-items-center">
                    
                        <div class="container">
                            
                            <div class="text-center">
                                <h2>{{$citaPaciente->fecha}}</h2>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-12 d-flex justify-content-center align-items-end">
                                    <a class="btn btn-primary" id="mediumButton" href="#" role="button" data-toggle="modal" data-target="#mediumModal" 
                                    data-attr="{{ route('crearCitaDoctoraDental',$citaPaciente->paciente_id) }}">Crear Cita</a>
                                </div>
                                <div class="form-group col-md-4 col-12 d-flex justify-content-center align-items-end">
                                    <a class="btn btn-primary" id="mediumButton" href="#" role="button" data-toggle="modal" data-target="#mediumModal" 
                                    data-attr="{{ route('rDentalesRecetasExp',$citaPaciente->id) }}">Crear Receta</a>
                                </div>
                                <div class="form-group col-md-4 col-12 d-flex justify-content-center align-items-end">
                                    <a class="btn btn-primary" id="mediumButton" href="#" role="button" data-toggle="modal" data-target="#mediumModal" 
                                    data-attr="{{ route('createPagoExpedienteDental', $paciente->id) }}">Pagos</a>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="card-body" >
        <h2 class="text">Información personal</h2>
        <div class="card">
            <div class="container">
                
                <div class="row" style="margin-top:10px;">
                    <div class="form-group col-md-6 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Nombre: {{$paciente->nombres}}</label>
                    </div>
                    <div class="form-group col-md-3 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Apellido: {{$paciente->apellidos}}</label>
                    </div>
                    </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Celular: {{$paciente->telefonoCelular}}</label>
                    </div>
                    <div class="form-group col-md-3 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Fecha de nacimiento: {{$paciente->fechaDeNacimiento}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12 d-flex justify-content align-items-end">
                        <label class="text-center">Dirección: {{$paciente->direccion}}</label>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text">Odontograma</h2>
            <div class="card">
                <div class="container">
                    <br>
                    <div class="row">
                        <div class="col columna1" >
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[7]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">18</button>
                            </a>
                        </div>
                            
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[6]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">17</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[5]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">16</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[4]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">15</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[3]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">14</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[2]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">13</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[1]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">12</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[0]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">11</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[8]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">21</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[9]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">22</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[10]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">23</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[11]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">24</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[12]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">25</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[13]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">26</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[14]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">27</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[15]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">28</button>
                            </a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col columna1">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[31]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">48</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[30]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">47</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[29]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">46</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[28]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">45</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[27]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">44</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[26]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">43</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[25]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">42</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[24]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">41</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[16]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">31</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[17]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">32</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[18]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">33</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[19]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">34</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[20]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">35</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[21]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">36</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[22]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">37</button>
                            </a>
                        </div>
                        <div class="col">
                            <a  id="mediumButton" data-toggle="modal" data-target="#mediumModal"  href="#" role="button" 
                                data-attr="{{route('showDiente',[$dientes[23]->id,$citaPaciente->fecha])}}">
                                <button type="button" class="btn btn-outline-primary">38</button>
                            </a>
                        </div>
                    </div>
                    <br>             
                </div>
            </div>
            <div class="row">
                <div class="col" style="text-align:center;">
                    <a class="btn btn-primary" href="#" role="button">Registro de Tratamientos</a>
                </div>
                <div class="col" style="text-align:center;">
                    <a class="btn btn-primary" href="{{route('showRecetasPaciente',$citaPaciente->id)}}" role="button">Registro de Recetas</a>
                </div>
            </div>
        <h2 class="text">Registro de Pagos</h2>
        <div class="card">
            
                <div class=" p-4 mb-4">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Costo</th>
                                        <th scope="col">Abono</th>
                                        <th scope="col">Restante</th>
                                        <th scope="col">Pago</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($pagos as $pago)
                                        <tr>
                                            <th scope="row">{{$pago->fecha}}</th>
                                            <td>{{$pago->descripcion}}</td>
                                            <td>${{$pago->costo}}</td>
                                            <td>${{$pago->abono}}</td>
                                            <td>${{$pago->costo - $pago->abono}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1" id="mediumButton" data-toggle="modal"
                                                        data-target="#mediumModal"
                                                        href="#" role="button"                                      data-attr="{{ route('createAbonoExpedienteDental',['idPaciente'=>$paciente->id,'idPago' => $pago->id]) }}"
                                                        >
                                                        <i class="fas fa-hand-holding-usd"></i>
                                                </a>
                                                <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1" id="mediumButton" data-toggle="modal"
                                                        data-target="#mediumModal"
                                                        href="#" role="button"                                      data-attr="{{ route('showAbonosExpedienteDental', $pago->id) }}"
                                                        >
                                                        <i class="fas fa-list-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    

    <!-- Modal Registrar/Editar/Eliminar -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <---Titulo--->
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" form="formCreate" class="btn btn-primary" id="registrar">Registrar</button>
                    <!--<button type="submit" form="formEdit" class="btn btn-primary" id="editar">Editar</button>
                    <button type="submit" form="formDelete" class="btn btn-danger" id="eliminar">Eliminar</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- modal de mensaje correto-->
    <div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-body py-5">
                @if ($message = Session::get('success'))
                    <img class='w-25 mx-auto mb-3 d-block' src="{{asset('assets/img/check.svg')}}"/>
                    <p class="text-white text-center">{{ $message }}</p>
                    <script type="text/javascript">
                        $('#modalSuccess').modal('show');
                        setTimeout(function(){
                            $('#modalSuccess').modal('hide')
                        }, 5000);
                    </script>
                @endif
                
                @if ($message = Session::get('error'))
                    <img class='w-25 mx-auto mb-3 d-block' src="{{asset('assets/img/error.svg')}}"/>
                    <p class="text-white text-center">{{ $message }}</p>
                    <script type="text/javascript">
                        $('#modalSuccess').modal('show');
                        setTimeout(function(){
                            $('#modalSuccess').modal('hide')
                        }, 8000);
                    </script>
                @endif
            </div>
        </div>
        </div>
    </div>


    <script>
        

        @if (count($errors) > 0)

            let href=localStorage.getItem('formulario');
            mostrarModal(href)
                setTimeout(function(){
                @foreach ($errors->getMessages() as $key => $value)
                    @error($key)
                        $("[name='{{$key}}']").addClass('is-invalid').parent().append('<div class="invalid-feedback"><p>{{$message}}</p></div>')
                    @enderror
                    $("[name='{{$key}}']").val('{{ old($key) }}');
                @endforeach
            },500);
        @endif

        
        
        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            mostrarModal(href)
            localStorage.setItem('formulario', href);
        });

        function mostrarModal(href) {
            /*document.getElementById('registrar').style.display = 'block';
            document.getElementById('editar').style.display = 'block';
            document.getElementById('eliminar').style.display = 'block';*/
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 0

            })

            var letra = href.charAt(href.length - 1);
            var b = document.getElementById('exampleModalLongTitle').innerHTML = "Registrar";
        }
    </script>
    <style>
        .btn-outline-primary{
            padding: 5px;
        }
        .col{
            padding: 0px 15px 15px 15px;
        }
        

    </style>
@endsection