@extends('layouts.one_column_template')

@section('custom_styles')

    <link href="{{ asset('assets/plugins/bootstrap-treeview/css/bootstrap-treeview.css') }}">

@endsection

@section('custom_scripts')

    <script src="{{ asset('assets/plugins/bootstrap-treeview/js/bootstrap-treeview.js') }}" defer></script>

    <script>
        'use strict';

        let categories = <?php echo $categories; ?>;

        $(function () {
            $('#categories').treeview({
                data: categories,
                color: "#428bca",
                levels: 2,
                showBorder: false,
                enableLinks: true
            });
        });

    </script>

@endsection

@section('title', 'Categories')

@section('header')

    @include('layouts.components.header')

@endsection

@section('content')

    <div class="container py-5">
        @if(isset($flash_message))
            <div class="row">
                <h1>{{ $flash_message }}</h1>
            </div>
        @endif

        <div class="row">

            <div class="card col-sm-5 mx-auto">
                <div class="card-header d-flex align-items-center py-3">
                    <h2 class="m-0">Categories</h2>
                    <div class="btn-group ml-auto">
                        <a href="{{ route('web_category_edit') }}" class="btn btn-outline-secondary ml-auto">Edit</a>
                        <a href="{{ route('web_category_create') }}" class="btn btn-primary ml-auto">Add new</a>
                    </div>
                </div>

                <div class="card-body">
                    <div id="categories" class="categories-tree"></div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('footer')

    @include('layouts.components.footer')

@endsection