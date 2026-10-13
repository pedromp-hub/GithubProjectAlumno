@extends('template.base')

@section('css')
<link href="{{ asset('assets/style/show.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="container my-5">
    <div class="row g-4">


        <div class="col-12 col-md-4">
            <div class="card text-center">
                <img src="{{ asset('fotos/1.png') }}" class="card-img-top" alt="Juan">
                <div class="card-body">
                    <h5 class="card-title">Juan García</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection