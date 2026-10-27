@extends('template.base')

@section('css')
<link href="{{ asset('assets/style/show.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <h1>Módulos</h1>
    <a href="{{ route('alumno.create') }}" class="btn btn-secondary mb-3">Crear Alumno</a>
    <a href="{{ route('modulo.create') }}" class="btn btn-secondary mb-3">Crear Módulo</a>
    <a href="{{ route('alumno.index') }}" class="btn btn-secondary mb-3">Ver Alumnos</a>
    <a href="{{ route('modulo.index') }}" class="btn btn-secondary mb-3">Ver Módulos</a>
    <hr>
</div>
<div class="container my-5">
    <div class="row g-4">
        <div class="col-12 col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">{{ $modulo->nombre . ' ' . $modulo->abreviatura }}</h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title">{{ $modulo->horas }}h</h4>
                    <h4 class="card-title">{{ $modulo->creditos }} créditos</h4>
                    <a href="{{ route('modulo.index') }}" class="btn btn-secondary">Back</a>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection