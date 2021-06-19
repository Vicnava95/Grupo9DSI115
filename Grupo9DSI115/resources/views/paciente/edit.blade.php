<!-- Agregar contenido de la pagina web-->
<div class="col-md-12">

    @includeif('partials.errors')

        <div class="card-header">
            <span class="card-title">Actualizar paciente</span>
        </div>
        <div class="card-body">
            <form method="POST" id="formEdit" action="{{ route('pacientes.update', $paciente->id) }}"  role="form" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                @csrf
                @include('paciente.form')
                <!--<div class="box-footer mt20">
                    <button type="submit" form="formEdit" class="btn btn-primary float-right">Enviar</button>-->
                </div>
            </form>
        </div>
</div>