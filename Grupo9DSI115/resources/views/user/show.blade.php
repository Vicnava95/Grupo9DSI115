<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Show User</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $user->name }}
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                    <div class="form-group">
                        <strong>Rols Fk:</strong>
                        {{ $user->rols_fk }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

