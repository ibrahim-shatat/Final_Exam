@extends('cms.parent')

@section('title', 'Edit Admin')

@section('sub-title', 'Edit Admin')


@section('left-title', 'edit-Admin')

@section('style')
@endsection




@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="first_name" >Admin First_Name</label>
                    <input type="text" value = "{{ $admins ->first_name }}" class="form-control" id="first_name" name="first_name"placeholder="Enter Admin First_Name">
                </div>
                <div class="form-group">
                    <label for="last_name">Admin Last_Name</label>
                    <input  type="text" class="form-control" id="last_name" name="last_name"
                        placeholder="Enter Admin Last_Name"value = "{{ $admins ->last_name }}">
                </div>
                <div class="form-group">
                    <label for="code">Admin mobile</label>
                    <input  type="text" class="form-control" id="mobile" name="mobile"
                        placeholder="Enter Admin mobile"value = "{{ $admins ->mobile }}">
                </div>
                <div class="form-group">
                    <label for="code">Admin date</label>
                    <input  type="date" class="form-control" id="date" name="date"
                        placeholder="Enter Admin date"value = "{{ $admins ->date }}">
                </div>
                <div class="form-group">
                    <label for="gender">Admin gender</label>
                    <input  type="text" class="form-control" id="gender" name="gender"
                        placeholder="Enter Admin gender"value = "{{ $admins ->gender }}">
                </div>
                <div class="form-group">
                    <label for="status">Admin status</label>
                    <input  type="text" class="form-control" id="status" name="status"
                        placeholder="Enter Admin status"value = "{{ $admins ->status }}">
                </div>
                <div class="form-group">
                    <label for="email">Admin Email</label>
                    <input  type="email" class="form-control" id="email" name="email"
                        placeholder="Enter Admin email"value = "{{ $admins ->email }}">
                </div>
                <div class="form-group">
                    <label for="password">Admin Password</label>
                    <input  type="text" class="form-control" id="password" name="password"
                        placeholder="Enter Admin password"value = "{{ $admins ->password }}">
                </div>
            </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <a type="submit" class="btn btn-danger" href ="{{ route('admins.index') }}" >Back</a>

        <button type="button"onclick="performUpdate({{ $admins->id }})" class="btn btn-success">Update</button>
    </div>
    </form>
    </div>
@endsection

@section('script')
<script>
    function performUpdate(id){
        let formData = new FormData();
        formData.append('first_name',document.getElementById('first_name').value);
        formData.append('last_name',document.getElementById('last_name').value);
        formData.append('mobile',document.getElementById('mobile').value);
        formData.append('date',document.getElementById('date').value);
        formData.append('gender',document.getElementById('gender').value);
        formData.append('status',document.getElementById('status').value);
        formData.append('email',document.getElementById('email').value);
        formData.append('password',document.getElementById('password').value);
        storeRoute('/cms/admin/admins_update/'+id , formData)

    }
</script>
@endsection
