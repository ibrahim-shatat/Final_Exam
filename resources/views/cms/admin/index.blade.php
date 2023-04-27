@extends('cms.parent')

@section('title', 'Index Admin')

@section('sub-title', 'Index Admin')

@section('left-title', 'Index Admin')

@section('style')

@endsection


@section('content')
    <div class="card-header">
        <h3 class="card-title mt-2 mr-2">Admin Table</h3>
        <div></div>
        <a type="submit" class="btn btn-success mb-2" href ="{{ route('admins.create') }}" ><i class="fas fa-plus-circle nav-icon"></i> Create New Admin</a>
        <a type="submit" class="btn btn-primary  mb-2 ml-5" href ="/cms/admin/admins_recycle" >  <i class="fas fa-trash-alt"></i> Recycle Bin</a>

    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>

                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->first_name }}</td>
                        <td>{{ $admin->email }}</td>

                        <td>{{ $admin->status }}</td>
                        <td><a type="button" class="btn btn-info"
                                style="margin-right: 5px;"href="{{ route('admins.edit', $admin->id) }}">
                                <i class="fas fa-edit"></i> Edit
                            </a> <a type="button" onclick="performDestroy({{ $admin->id }}, this) " class="btn btn-danger" style="margin-right: 5px;">
                                <i class="fas fa-trash-alt"></i> Delete
                            </a><a type="button" class="btn btn-success"
                                style="margin-right: 5px;"href="{{ route('admins.show', $admin->id) }}">
                                <i class="far fa-eye"></i> show
                            </a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $admins->links() }}
    </div>
@endsection

@section('script')

<script>
    function performDestroy(id,reference){
        let url = '/cms/admin/admins/'+id;
        confirmDestroy(url,reference);
    }
</script>    
@endsection
