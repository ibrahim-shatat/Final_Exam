@extends('cms.parent')

@section('title', 'RecycleBin Company')

@section('sub-title', 'RecycleBin Company')

@section('left-title', 'RecycleBin Company')

@section('style')

@endsection


@section('content')
    <div class="card-header">
        <h3 class="card-title mt-2 mr-2">Company Table</h3>

    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $Company)
                    <tr>
                        <td>{{ $Company->id }}</td>
                        <td>{{ $Company->name }}</td>
                        <td>{{ $Company->email }}</td>
                        <td>{{ $Company->status }}</td>
                        <td><a type="submit" class="btn btn-info"
                                style="margin-right: 5px;" href = "companies_restore/{{$Company->id }}">
                                <i class="fas fa-edit"></i> Restore
                            </a> <a type="submit" href ="companies_delete/{{$Company->id}}" class="btn btn-danger" style="margin-right: 5px;">
                                <i class="fas fa-trash-alt"></i> Permanent Deletion
                            </a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $companies->links() }}
    </div>
@endsection

@section('script')
  
@endsection
