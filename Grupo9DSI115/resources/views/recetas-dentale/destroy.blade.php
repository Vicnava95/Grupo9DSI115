<form id="formDelete" action="{{ route('rDentales.destroy', $rDentale->id) }}" method="POST">
    @csrf
    @method("DELETE")
    <div class="modal-content bg-dark">

        <div class="modal-body" id="mediumBody">
            <div>
                <!-- the result to be displayed apply here -->
                ¿Desea eliminar la receta emitida el:  <b>{{$rDentale->fecha}}</b>?
            </div>
        </div>

    </div>
</form>