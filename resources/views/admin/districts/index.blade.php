@extends('admin.layouts.master')

@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <h4 class="card-title">Districts</h4>
                    <a href="{{ route('admin.districts.create') }}" class="btn btn-primary"> Add District </a>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>State</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($districts as $district) 
                                <tr>
                                    <td>{{ $district->name }}</td>
                                    <td>{{ $district->state?->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.districts.edit', $district->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('admin.districts.destroy', $district->id) }}" class="d-inline" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection