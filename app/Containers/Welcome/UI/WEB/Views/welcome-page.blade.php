@extends('layouts.one_column_template')

@section('title', 'Welcome page')

@section('header')

    @include('layouts.components.header')

@endsection

@section('content')

    {{--<div class="container-fluid" style="min-height: 70vh">
        <div class="col-12 d-flex flex-column justify-content-center align-content-center h-100">

            <h1 class="title m-b-md mx-auto display-1">Service list</h1>

            <div class="links mx-auto">
                <a href="#">Documentation</a>
                <a href="https://github.com/maxinoxoft/servicelist">GitHub</a>
            </div>

        </div>
    </div>--}}

    <div class="container">
        @if(isset($flash_message))
            <div class="row">
                <h1>{{ $flash_message }}</h1>
            </div>
        @endif
        <div class="row">
            <form action="/categories" class="card col-5 mx-auto" method="post">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Add category</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="example-text-input" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Parent category</label>
                        <select class="form-control custom-select">
                            <option value="null">None</option>
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="d-flex">
                        <a href="javascript:void(0)" class="btn btn-link">Cancel</a>
                        <button type="submit" class="btn btn-primary ml-auto">Send data</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('footer')

    @include('layouts.components.footer')

@endsection