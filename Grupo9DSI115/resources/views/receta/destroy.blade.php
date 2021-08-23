
        <form id="formDelete" action="{{ route('recetas.destroy', $receta->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <div class="modal-content bg-dark">

                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                        ¿Desea eliminar la receta de la consulta realizada el dia <b>{{ $receta->consulta->fecha }}</b>?
                    </div>
                </div>

            </div>
        </form>
