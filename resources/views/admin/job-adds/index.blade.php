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
                    <h4 class="card-title">Adds</h4>
                    <a href="{{ route('admin.job-adds.create') }}" class="btn btn-primary"> Add Adds </a>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Hospital</th>
                                <th>Speciality</th>
                                <th>Job name</th>
                                <th>Job Type</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobAdds as $job)
                                <tr>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->hospital?->user?->name }}</td>
                                    <td>{{ $job->specialty?->name }}</td>
                                    <td>{{ $job->jobInfo?->name }}</td>
                                    <td>{{ $job->job_type }}</td>
                                    <td>{{ $job->location }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('admin.job-adds.edit', $job->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ route('admin.job-adds.destroy', $job->id) }}"
                                            class="d-inline" method="POST">
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
