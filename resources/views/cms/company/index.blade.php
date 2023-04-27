@extends('cms.parent')

@section('title', 'Index Company')

@section('sub-title', 'Index Company')

@section('left-title', 'Index Company')

@section('style')

@endsection


@section('content')
    <div class="card-header">
        <h3 class="card-title mt-2 mr-2">Company Table</h3>
        <div></div>
        <a type="submit" class="btn btn-success mb-2" href ="{{ route('companies.create') }}" ><i class="fas fa-plus-circle nav-icon"></i> Create New Company</a>
        <a type="submit" class="btn btn-primary  mb-2 ml-5" href ="/cms/admin/companies_recycle" >  <i class="fas fa-trash-alt"></i> Recycle Bin</a>

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
                        <td><a type="button" class="btn btn-info"
                                style="margin-right: 5px;"href="{{ route('companies.edit', $Company->id) }}">
                                <i class="fas fa-edit"></i> Edit
                            </a> <a type="button" onclick="performDestroy({{ $Company->id }}, this) " class="btn btn-danger" style="margin-right: 5px;">
                                <i class="fas fa-trash-alt"></i> Delete
                            </a><a type="button" class="btn btn-success"
                                style="margin-right: 5px;"href="{{ route('companies.show', $Company->id) }}">
                                <i class="far fa-eye"></i> show
                            </a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $companies->links() }}
    </div>
@endsection

@section('script')

<script>
    function performDestroy(id,reference){
        let url = '/cms/admin/companies/'+id;
        confirmDestroy(url,reference);
    }
</script>    
@endsection
