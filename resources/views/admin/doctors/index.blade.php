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
                    <h4 class="card-title">Doctors</h4>
                    <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary"> Add Doctor </a>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Speciality</th>
                                <th>job info</th>
                                <th>phone</th>
                                <th>Willing to relocate</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doctors as $doctor) 
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/doctor/personal_imgs/' . $doctor->photo) }}" width="70"
                                            height="70" alt=""
                                            loading="lazy"
                                            onerror="this.onerror=null; this.src='{{ $doctor->photo }}'">
                                    </td>
                                    <td>{{ $doctor->user?->name }}</td>
                                    <td>{{ $doctor->specialty?->name }}</td>
                                    <td>{{ $doctor->jobInfo?->name }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->willing_to_relocate ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <a href="{{ route('admin.doctors.edit', $doctor->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" class="d-inline"
                                            method="POST">
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