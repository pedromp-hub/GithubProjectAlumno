@extends('template.base')
<!-- directiva de blade, para indicar que se hereda de un documento  -->

@section('title')
GitHub Project
@endsection

@section('content')
<!-- directiva para rellenar un espacio creado con yield -->
<div class="container d-flex align-items-center flex-column">
    <!-- Masthead Avatar Image-->
    <img class="masthead-avatar mb-5" src="{{ asset('assets/img/avataaars.svg') }}" alt="..." />
    <!-- Masthead Heading-->
    <h1 class="masthead-heading text-uppercase mb-0">Start Bootstrap</h1>
    <!-- Icon Divider-->
    <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
    </div>
    <!-- Masthead Subheading-->
    <p class="masthead-subheading font-weight-light mb-0">Graphic Artist - Web Designer - Illustrator</p>
</div>
@endsection