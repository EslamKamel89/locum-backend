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
                <h4 class="card-title">Job Applications</h4>
                <div class="row m-t-40">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">{{ $jobsCount }}</h1>
                                <h6 class="text-white">Total jobs</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white">{{ $jobsPendingCount }}</h1>
                                <h6 class="text-white">Pending</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white">{{ $jobsAcceptedCount }}</h1>
                                <h6 class="text-white">Accepted</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white">{{ $jobsRejectedCount }}</h1>
                                <h6 class="text-white">Rejected</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Doctor Photo</th>
                                <th>Doctor Name</th>
                                <th>Hospital name</th>
                                <th>Application Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobApplications as $jobApplication) 
                                <tr>
                                    <td>
                                        <img src="{{ asset($jobApplication->doctor->photo) }}" width="70" height="70" alt=""
                                            loading="lazy"
                                            onerror="this.onerror=null; this.src='{{ $jobApplication->doctor->photo }}'">
                                    </td>
                                    <td>{{ $jobApplication->doctor?->user?->name }}</td>
                                    <td>{{ $jobApplication->jobAdd?->hospital?->user?->name }}</td>
                                    <td>{{ $jobApplication->application_date }}</td>
                                    <td>
                                        @switch($jobApplication->status->value)
                                            @case('pending')
                                                <span class="badge badge-warning">{{ $jobApplication->status->value }}</span>
                                                @break
                                            @case('accepted')
                                                <span class="badge badge-success">{{ $jobApplication->status->value }}</span>
                                                @break
                                            @case('rejected')
                                                <span class="badge badge-danger">{{ $jobApplication->status->value }}</span>
                                                @break
                                            @default
                                                <span class="badge badge-secondary">{{ $jobApplication->status->value }}</span>
                                        @endswitch
                                    </td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('admin.jobApplications.show', $jobApplication->id) }}"
                                            class="btn btn-dark">Show</a>
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