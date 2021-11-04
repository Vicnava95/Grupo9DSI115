
        <form id="formDelete" action="{{ route('recetas.destroy', $receta->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <div class="modal-content bg-dark">

                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                        ¿Está por dar de baja la receta emitida el:  <b>{{ $receta->fecha }}</b>?<br>
                        ¿Desea seguir?
                    </div>
                </div>

            </div>
        </form>
