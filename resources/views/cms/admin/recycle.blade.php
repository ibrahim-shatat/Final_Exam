@extends('cms.parent')

@section('title', 'RecycleBin Admin')

@section('sub-title', 'RecycleBin Admin')

@section('left-title', 'RecycleBin Admin')

@section('style')

@endsection


@section('content')
    <div class="card-header">
        <h3 class="card-title mt-2 mr-2">Admin Table</h3>

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
                        <td><a type="submit" class="btn btn-info"
                                style="margin-right: 5px;" href = "admins_restore/{{$admin->id }}">
                                <i class="fas fa-edit"></i> Restore
                            </a> <a type="submit" href ="admins_delete/{{$admin->id}}" class="btn btn-danger" style="margin-right: 5px;">
                                <i class="fas fa-trash-alt"></i> Permanent Deletion
                            </a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $admins->links() }}
    </div>
@endsection

@section('script')
  
@endsection
