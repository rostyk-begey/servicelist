<form action="{{ route('web_category_store') }}" id="form_add_category" class="card col-5 mx-auto" method="POST" role="form" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card-header">
        <h3 class="card-title">Add category</h3>
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
            <label class="form-label" for="parent_id">Parent category</label>
            <input type="hidden" id="parent_id" name="parent_id" value="null">
            <div id="categories"></div>
        </div>
    </div>
    <div class="card-footer text-right">
        <div class="d-flex">
            <a href="{{ route('web_category_index') }}" class="btn btn-link">Cancel</a>
            <button type="submit" id="btn-add" class="btn btn-primary ml-auto">Create category</button>
        </div>
    </div>
</form>
