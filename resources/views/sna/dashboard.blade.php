@extends('layouts.master')

@section('title', 'Instansi | SNA MEDIKA')

@section('content')



<section class=" vh-100  d-flex align-items-center justify-content-center ">

    @include('layouts.breadcrumbs', ['title' => 'Dashboard'])



    <div class="text-center">
        <div class="card shadow-lg ">
            <div class="card-body">
                <h1 class="display-4 mb-4">Welcome!</h1>
                <p class="lead">We are thrilled to have you here. Let's get started with your journey.</p>
                <div class="mt-4">
                    <a href="#" class="btn btn-primary btn-lg">Get Started</a>
                    <a href="#" class="btn btn-outline-secondary btn-lg">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection