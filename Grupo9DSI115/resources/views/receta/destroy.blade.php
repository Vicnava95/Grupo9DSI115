
        <form id="formDelete" action="{{ route('recetas.destroy', $receta->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <div class="modal-content bg-dark">

                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                        ¿Desea eliminar la receta del paciente <b>{{$paciente->apellidos}}, {{$paciente->nombres}}</b>  en el dia <b>{{ $receta->fecha }}</b>?
                    </div>
                </div>

            </div>
        </form>
