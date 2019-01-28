@extends('layouts.one_column_template')

@section('title', 'Create category')

@section('header')

    @include('layouts.components.header')

@endsection

@section('custom_styles')

    <link href="{{ asset('assets/plugins/bootstrap-treeview/css/bootstrap-treeview.css') }}">

@endsection

@section('custom_scripts')

    <script src="{{ asset('assets/plugins/bootstrap-treeview/js/bootstrap-treeview.js') }}" defer></script>

    <script>
        'use strict';

        let categories = <?php echo $categories ?>;
        console.log(categories);

        $(function () {

            $('#categories').treeview({
                data: categories,
                color: "#428bca",
                levels: 1,
                showBorder: false,
                enableLinks: false,
            });

            $('#categories').on('nodeSelected', (event, data) => {

                console.log(data['id']);

                $("#parent_id").val(data['id']);
            });

            $('#btn-add').click((e)=>{

                e.preventDefault();

                let requestData = {
                    'parent_id': $("[name='parent_id']").val(),
                    'name': $("[name='name']").val(),
                };

                let token = $('input[name="_token"]').val();

                $.ajax({
                    type: 'POST',
                    url:'/categories/store',
                    headers: {
                        'X-CSRF-Token': token
                    },
                    data: { parent_id: requestData['parent_id'], name: requestData['name'] },
                    success:function(data) {

                        $("#flash_message").removeClass('hide').show().text('Catedory successfully created').fadeOut(2000);

                        let categories = data;

                        $('#categories').treeview({
                            data: categories,
                            color: "#428bca",
                            levels: 1,
                            showBorder: false,
                            enableLinks: false,
                        });

                    }
                });

            });

        });

    </script>

@endsection

@section('content')

    <div class="container py-5">
        @if( Session::get('flash_message') )
            <div class="row h-auto justify-content-between hide">
                <div class="alert col-12 alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('flash_message') }}
                </div>
            </div>
        @endif
        <div class="row">
            @include('layouts.components.forms.form_add_category')
        </div>

    </div>

@endsection

@section('footer')

    @include('layouts.components.footer')

@endsection