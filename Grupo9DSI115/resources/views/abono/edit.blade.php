
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Abono</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" id="formEdit" action="{{ route('abonos.update', $abono->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('abono.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
