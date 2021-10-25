
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">
            @includeif('partials.errors')
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Update Recetas Dentale</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('rDentales.update', $recetasDentale->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf
                        @include('recetas-dentale.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

