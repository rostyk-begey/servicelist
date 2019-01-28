<div id="form_edit_category" class="card col-5 mx-auto" method="POST" role="form" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <input name="_method" type="hidden" value="PATCH">
    <div class="card-header">
        <h3 class="card-title">Edit category</h3>
    </div>
    <div class="card-body">
        <div class="row h-auto justify-content-between">
            <div id="flash_message" class="alert col-12 alert-success alert-dismissible hide">
            </div>
        </div>
        <div class="form-group">
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Name" required autofocus>
        </div>
        <div class="form-group">
            <label class="form-label" for="id">Parent category</label>
            <input type="hidden" id="id" name="id" value="null">
            <div id="categories"></div>
        </div>
    </div>
    <div class="card-footer text-right">
        <div class="d-flex">
            <a href="{{ route('web_category_index') }}" class="btn btn-link">Cancel</a>
            <div class="btn-group ml-auto">
                <button id="btn-delete" type="button" class="btn btn-red">Delete</button>
                <button id="btn-update" type="button" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

