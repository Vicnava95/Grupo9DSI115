
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header text-center">
                        <span class="card-title">Diente número: {{$diente->numeroDiente}}</span>
                        <br>
                        <span class="card-title">Nombre: {{$diente->nombreDiente}}</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" id="formCreate" action="{{route('storeTratamiento', [$diente->id, $fecha])}}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descripción</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3"></textarea>
                            </div> 
                        </form>
                        @if (!$tratamientos->isEmpty())
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Descripción</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                @foreach ($tratamientos as $tratamiento)
                                                    <tr>
                                                        <th scope="row">{{$n++}}</th>
                                                        <td>{{$tratamiento->fecha}}</td>
                                                        <td>{{$tratamiento->descripcion}}</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1" id="mediumButton" data-toggle="modal"
                                                                    data-target="#mediumModal"
                                                                    href="#" role="button"                                      data-attr="#"
                                                                    >
                                                                    <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1" id="mediumButton" data-toggle="modal"
                                                                    data-target="#mediumModal"
                                                                    href="#" role="button"                                      data-attr="#"
                                                                    >
                                                                    <i class="fas fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
