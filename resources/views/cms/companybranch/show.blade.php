@extends('cms.parent')

@section('title', 'Show Company')

@section('sub-title', 'Show Company')


@section('left-title', 'Show-Company')

@section('style')
@endsection




@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Show CompanyBranch</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="name" disabled >Company Name</label>
                    <input type="text" value = "{{ $companies ->name }}" class="form-control" id="name" name="name"placeholder="Enter Company First_Name">
                </div>
                <div class="form-group">
                    <label for="description">Company Description</label>
                    <input disabled type="text" class="form-control" id="description" name="description"
                        placeholder="Enter Company Description"value = "{{ $companies ->description }}">
                </div>
                <div class="form-group">
                    <label for="status">Company status</label>
                    <input disabled type="text" class="form-control" id="status" name="status"
                        placeholder="Enter Company status"value = "{{ $companies ->status }}">
                </div>
                <div class="form-group">
                    <label for="email">Company Email</label>
                    <input disabled type="email" class="form-control" id="email" name="email"
                        placeholder="Enter Company email"value = "{{ $companies ->email }}">
                </div>
            </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <a type="submit" class="btn btn-success" href ="{{ route('companybranches.index') }}" >Back</a>
        <button type="button" onclick="performDestroy({{ $companies->id }}, this) "class="btn btn-danger">Delete</button>

    </div>
    </form>
    </div>
@endsection

@section('script')
<script>
    function performDestroy(id,reference){
        let url = '/cms/admin/companybranches/'+id;
        confirmDestroy(url,reference);
    }
</script>
@endsection
