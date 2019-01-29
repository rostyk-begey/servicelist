@extends('layouts.one_column_template')

@section('title', 'Welcome page')

@section('header')

    @include('layouts.components.header')

@endsection

@section('content')

    <div class="container-fluid" style="min-height: 70vh">
        <div class="col-12 d-flex flex-column justify-content-center align-content-center h-100">

            <h1 class="title m-b-md mx-auto display-1">Service list</h1>

            <div class="links mx-auto">
                <a href="#">Documentation</a>
                <a href="https://github.com/maxinoxoft/servicelist">GitHub</a>
            </div>

        </div>
    </div>

@endsection

@section('footer')

    @include('layouts.components.footer')

@endsection