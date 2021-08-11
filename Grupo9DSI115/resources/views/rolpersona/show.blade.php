@extends('layouts.app')

@section('template_title')
    {{ $rolpersona->name ?? 'Show Rolpersona' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Rolpersona</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('rolpersonas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombrerolpersona:</strong>
                            {{ $rolpersona->nombreRolPersona }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
