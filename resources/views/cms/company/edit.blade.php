@extends('cms.parent')

@section('title', 'Edit Company')

@section('sub-title', 'Edit Company')


@section('left-title', 'edit-Company')

@section('style')
@endsection




@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Company</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="name" >Company Name</label>
                    <input type="text" value = "{{ $companies ->name }}" class="form-control" id="name" name="name"placeholder="Enter Company First_Name">
                </div>
                <div class="form-group">
                    <label for="description">Company Description</label>
                    <input  type="text" class="form-control" id="description" name="description"
                        placeholder="Enter Company description"value = "{{ $companies ->description }}">
                </div>
                <div class="form-group">
                    <label for="status">Company status</label>
                    <input  type="text" class="form-control" id="status" name="status"
                        placeholder="Enter Company status"value = "{{ $companies ->status }}">
                </div>
                <div class="form-group">
                    <label for="email">Company Email</label>
                    <input  type="email" class="form-control" id="email" name="email"
                        placeholder="Enter Company email"value = "{{ $companies ->email }}">
                </div>
            </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <a type="submit" class="btn btn-danger" href ="{{ route('companies.index') }}" >Back</a>

        <button type="button"onclick="performUpdate({{ $companies->id }})" class="btn btn-success">Update</button>
    </div>
    </form>
    </div>
@endsection

@section('script')
<script>
    function performUpdate(id){
        let formData = new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('description',document.getElementById('description').value);
        formData.append('email',document.getElementById('email').value);
        formData.append('password',document.getElementById('password').value);
        formData.append('status',document.getElementById('status').value);
        storeRoute('/cms/admin/companies_update/'+id , formData)

    }
</script>
@endsection
