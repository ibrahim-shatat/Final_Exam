@extends('cms.parent')
@section('title', 'Home Page')

@section('styles')
    <style>
        a {
            color: black;
            font-weight: bold
        }

        a:hover {
            text-decoration: none;
        }
    </style>

@endsection
@section('content')


    <div class="container-fluid">
        
            <div class="row">

                @php
                    use App\Models\Admin;
                    $serCount = Admin::count('id');
                @endphp

                @can('Create Admin')

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <a href="{{ route('admins.create') }}" class="info-box-icon bg-warning elevation-1"><i
                                class="fa-solid fas fa-sticky-note"></i></a>

                        <div class="info-box-content">
                            <a href="{{ route('admins.create') }}" class="info-box-text"> Number of Admins</a>
                            <a href="{{ route('admins.create') }}" class="info-box-number">{{ $serCount }}</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                @endcan

            </div>
        </div>

    @endsection

@section('scripts')

@endsection
