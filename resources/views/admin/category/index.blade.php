@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Category
                        <a href="{{ url('admin/category/create') }}" class="btn btn-primary float-end btn-sm">Add Category</a>
                    </h3>
                </div>
                <div class="card-body">

                </div>
            </div>

        </div>
    </div>
@endsection
