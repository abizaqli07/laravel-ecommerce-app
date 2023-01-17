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
                    <h3>Colors
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-primary float-end btn-sm">Add
                            Colors</a>
                    </h3>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Color Code</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($colors as $color)
                                <tr>
                                    <td>{{ $color->id }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td>{{ $color->code }}</td>
                                    <td>{{ $color->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/colors/' . $color->id . '/edit') }}"
                                            class="btn button-sm btn-success">Edit</a>
                                        <a href="{{ url('admin/colors/' . $color->id . '/delete') }}"
                                            onclick="return confirm('Are you sure delete this data?')"
                                            class="btn button-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No colors Available</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
@endsection
