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

            let requestData = {
                'id': $("[name='id']").val(),
                'name': $("[name='name']").val(),
            };

            let updateRequestData = () => {
                requestData = {
                    'id': $("[name='id']").val(),
                    'name': $("[name='name']").val(),
                };
            };

            let fillInpt = (event, data) => {
                console.log(data['id']);

                $("[name='name']").val(data['text']);
                $("[name='id']").val(data['id']);

                updateRequestData();
            };

            let token = $('input[name="_token"]').val();

            let categoriesTree = $('#categories').treeview({
                data: categories,
                color: "#428bca",
                levels: 1,
                showBorder: false,
                enableLinks: false,
            });

            //$('#categories ul').sortable();
            //$('#categories').disableSelection();

            categoriesTree.on('nodeSelected', (event, data) => {
                fillInpt(event, data);
            });

            let executeAjax = (obj) => {
                $.ajax({
                    type: obj.method,
                    url:'/categories/'+requestData['id']+"/"+obj.url,
                    headers: {
                        'X-CSRF-Token': token
                    },
                    data: { id: requestData['id'], name: requestData['name'] },
                    success:function(data) {

                        $("#flash_message").removeClass('hide').show().text('Catedory successfully '+obj.url+'ed!').fadeOut(2000);

                        let categories = data;

                        categoriesTree.treeview({
                            data: categories,
                        });

                        categoriesTree.on('nodeSelected', (event, data) => {
                            fillInpt(event, data);
                        });

                    }
                });
            };

            $('#btn-update').click((e)=>{

                updateRequestData();

                e.preventDefault();

                executeAjax({method:'patch',url: 'update'});

            });

            $('#btn-delete').click((e)=>{

                e.preventDefault();

                executeAjax({method:'delete',url: 'delete'});

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
            @include('layouts.components.forms.form_edit_category')
        </div>

    </div>

@endsection

@section('footer')

    @include('layouts.components.footer')

@endsection