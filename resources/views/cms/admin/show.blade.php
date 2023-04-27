@extends('cms.parent')

@section('title', 'Show Admin')

@section('sub-title', 'Show Admin')


@section('left-title', 'Show-Admin')

@section('style')
@endsection




@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Show Admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="first_name" disabled >Admin First_Name</label>
                    <input type="text" value = "{{ $admins ->first_name }}" class="form-control" id="first_name" name="first_name"placeholder="Enter Admin First_Name">
                </div>
                <div class="form-group">
                    <label for="last_name">Admin Last_Name</label>
                    <input disabled type="text" class="form-control" id="last_name" name="last_name"
                        placeholder="Enter Admin Last_Name"value = "{{ $admins ->last_name }}">
                </div>
                <div class="form-group">
                    <label for="code">Admin mobile</label>
                    <input disabled type="text" class="form-control" id="mobile" name="mobile"
                        placeholder="Enter Admin mobile"value = "{{ $admins ->mobile }}">
                </div>
                <div class="form-group">
                    <label for="code">Admin date</label>
                    <input disabled type="date" class="form-control" id="date" name="date"
                        placeholder="Enter Admin date"value = "{{ $admins ->date }}">
                </div>
                <div class="form-group">
                    <label for="gender">Admin gender</label>
                    <input disabled type="text" class="form-control" id="gender" name="gender"
                        placeholder="Enter Admin gender"value = "{{ $admins ->gender }}">
                </div>
                <div class="form-group">
                    <label for="status">Admin status</label>
                    <input disabled type="text" class="form-control" id="status" name="status"
                        placeholder="Enter Admin status"value = "{{ $admins ->status }}">
                </div>
                <div class="form-group">
                    <label for="email">Admin Email</label>
                    <input disabled type="email" class="form-control" id="email" name="email"
                        placeholder="Enter Admin email"value = "{{ $admins ->email }}">
                </div>
                <div class="form-group">
                    <label for="password">Admin Password</label>
                    <input disabled type="text" class="form-control" id="password" name="password"
                        placeholder="Enter Admin password"value = "{{ $admins ->password }}">
                </div>
            </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <a type="submit" class="btn btn-success" href ="{{ route('admins.index') }}" >Back</a>
        <button type="button" onclick="performDestroy({{ $admins->id }}, this) "class="btn btn-danger">Delete</button>

        {{-- <button type="button"onclick="performUpdate({{ $admins->id }})" class="btn btn-success">Delete</button> --}}
    </div>
    </form>
    </div>
@endsection

@section('script')
{{-- <script>
    function performUpdate(id){
        let formData = new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('code',document.getElementById('code').value);

        storeRoute('/cms/admin/admins_update/'+id , formData)

    }
</script> --}}
<script>
    function performDestroy(id,reference){
        let url = '/cms/admin/admins/'+id;
        confirmDestroy(url,reference);
    }
</script>
@endsection
