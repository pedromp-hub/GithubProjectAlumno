@extends('template.base')

@section('css')
<link href="{{ asset('assets/style/show.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="container my-5">
    <div class="row g-4">


        <div class="col-12 col-md-4">
            <div class="card text-center">
                <img src="{{ asset('assets/img/profesor.jpg') }}" class="card-img-top" alt="Profesor">
                <div class="card-body">
                    <h5 class="card-title">{{ $profesor->nombre . ' ' . $profesor->apellidos . ' ' . $profesor->especialidad}}</h5>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h6 class="card-title">{{ Carbon\Carbon::parse($profesor->fecalta)->locale('es')-> translatedFormat('d \d\e F \d\e Y') }}</h6>
                    <h6 class="card-title">{{$profesor-> especialidad }}</h6>
                    <h6 class="card-title">{{$profesor-> salario }}€</h6>
                    <a href="{{ route('profesor.index')  }}" class="btn btn-secondary">Back</a>
                    <a href="{{ url()->previous()  }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection