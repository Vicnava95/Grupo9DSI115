@extends('Master.master')

@section('title')
Doctora Dental
@stop

@section('extraJS')
<script src="js/master.js"></script>
@stop

@section('extraCSS')
<link href="css/master.css" rel="stylesheet" type="text/css"/>
@stop

@section('tituloTemplate')
Doctora Dental
@stop

@section('contenido')
<h1>Todo el contenido</h1>
<a href="{{route('admin')}}" class="btn btn-light active" role="button" aria-pressed="true">Admin</a>
<a href="{{route('doctorGeneral')}}" class="btn btn-light active" role="button" aria-pressed="true">Doctor General</a>
<a href="{{route('doctoraDental')}}" class="btn btn-light active" role="button" aria-pressed="true">Doctora Dental</a>
<a href="{{route('secretaria')}}" class="btn btn-light active" role="button" aria-pressed="true">Secretaria</a>
@stop