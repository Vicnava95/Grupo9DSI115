
        <form id="formDelete" action="{{ route('recetas.destroy', $receta->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <div class="modal-content bg-dark">

                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                        Está por anular la receta emitida el:  <b>{{ $receta->fecha }}</b><br><br>
                        
                        Si desea cambiar la receta actual seleccione <b>Crear nueva versión</b> <br>
                        Si solamente desea dar de baja la receta seleccionada presione <b>Anular</b>.
                        
                    </div>
                </div>

            </div>
        </form>
