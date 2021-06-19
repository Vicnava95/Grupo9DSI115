@extends('Master.auth')

@section('title')
Home
@stop

@section('extraJS')
<script src="js/master.js"></script>
@stop

@section('extraCSS')
<link href="css/master.css" rel="stylesheet" type="text/css"/>
@stop

@section('tituloTemplate')
Nombre de la clínica
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
