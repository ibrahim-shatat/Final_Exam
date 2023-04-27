@extends('cms.parent')

@section('title', 'Create Admin')

@section('sub-title', 'Create Admin')


@section('left-title', 'create-Admin')

@section('style')
@endsection




@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="first_name">First_Name of Admin</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"placeholder="Enter Admin frstName">
                </div>
                <div class="form-group">
                    <label for="last_name">Last_Name of Admin</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"placeholder="Enter Admin lastName">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"placeholder="Enter Admin Email">
                </div>
                <div class="form-group">
                    <label for="password">password </label>
                    <input type="password" class="form-control" id="password" name="password"placeholder="Enter Admin Password">
                </div>
                <div class="form-group">
                    <label for="mobile">mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile"placeholder="Enter Admin mobile">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date"placeholder="Enter Admin date">
                </div>
                <div class="form-group" data-select2-id="29">
                    <label for = "gender">Gender</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="gender" name="gender" tabindex="-1" aria-hidden="true">
                      <option value="male">male</option>
                      <option value="female">female</option>
                    </select></span>
                </div>
                  <div class="form-group" data-select2-id="29">
                    <label for = "status">Status</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="status" name="status" tabindex="-1" aria-hidden="true">
                      <option value="active">active</option>
                      <option value="inactive">inactive</option>
                    </select></span>
                </div>
                {{-- <div class="form-group" data-select2-id="29">
                    <label for = "city_id">City Name</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" id="city_id" name="city_id" tabindex="-1" aria-hidden="true">
                      @foreach ( $cities as $city)
                      <option   value="{{ $city->id }}">{{ $city->name}}</option>

                      @endforeach
  
                    </select></span>
                </div> --}}
            </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="button" onclick = "performStore()" class="btn btn-success">Store</button>
        <a type="submit" class="btn btn-danger" href ="{{ route('admins.index') }}" >Back</a>
    </div>
    </form>
    </div>
@endsection

@section('script')

<script>
    function performStore() {
        let formData = new FormData();
        formData.append('first_name',document.getElementById('first_name').value);
        formData.append('last_name',document.getElementById('last_name').value);
        formData.append('email',document.getElementById('email').value);
        formData.append('date',document.getElementById('date').value);
        formData.append('password',document.getElementById('password').value);
        formData.append('mobile',document.getElementById('mobile').value);
        formData.append('gender',document.getElementById('gender').value);
        formData.append('status',document.getElementById('status').value);
        // formData.append('city_id',document.getElementById('city_id').value);
        store('/cms/admin/admins' , formData)
    }
</script>
@endsection
