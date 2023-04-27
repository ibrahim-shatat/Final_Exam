@extends('cms.parent')

@section('title', 'Create Company')

@section('sub-title', 'Create Company')


@section('left-title', 'create-Company')

@section('style')
@endsection




@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Company</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name of CompanyBranch</label>
                    <input type="text" class="form-control" id="name" name="name"placeholder="Enter Company Name">
                </div>
                <div class="form-group">
                    <label for="description">Description of CompanyBranch</label>
                    <input type="text" class="form-control" id="description" name="description"placeholder="Enter Company Description">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"placeholder="Enter Company Email">
                </div>
                <div class="form-group">
                    <label for="password">password </label>
                    <input type="password" class="form-control" id="password" name="password"placeholder="Enter Company Password">
                </div>
                  <div class="form-group" data-select2-id="29">
                    <label for = "status">Status</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="status" name="status" tabindex="-1" aria-hidden="true">
                      <option value="active">active</option>
                      <option value="inactive">inactive</option>
                    </select></span>
                </div>
            </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="button" onclick = "performStore()" class="btn btn-success">Store</button>
        <a type="submit" class="btn btn-danger" href ="{{ route('companybranches.index') }}" >Back</a>
    </div>
    </form>
    </div>
@endsection

@section('script')

<script>
    function performStore() {
        let formData = new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('description',document.getElementById('description').value);
        formData.append('email',document.getElementById('email').value);
        formData.append('password',document.getElementById('password').value);
        formData.append('status',document.getElementById('status').value);
        store('/cms/admin/companybranches' , formData)
    }
</script>
@endsection
