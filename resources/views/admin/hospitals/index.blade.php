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
                    <h4 class="card-title">Hospitals</h4>
                    <a href="{{ route('admin.hospitals.create') }}" class="btn btn-primary"> Add Hospital </a>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>facility name</th>
                                <th>type</th>
                                <th>contact person</th>
                                <th>contact phone</th>
                                <th>services offered</th>
                                <th>website url</th>
                                <th>year established</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hospitals as $hospital) 
                                <tr>
                                    <td>
                                        <img src="{{ asset($hospital->photo) }}" width="70" height="70" alt=""
                                            loading="lazy" onerror="this.onerror=null; this.src='{{ $hospital->photo }}'">
                                    </td>
                                    <td>{{ $hospital->user?->name }}</td>
                                    <td>{{ $hospital->facility_name }}</td>
                                    <td>{{ $hospital->type }}</td>
                                    <td>{{ $hospital->contact_person }}</td>
                                    <td>{{ $hospital->contact_phone }}</td>
                                    <td>{{ $hospital->services_offered }}</td>
                                    <td>{{ $hospital->website_url }}</td>
                                    <td>{{ $hospital->year_established }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('admin.hospitals.edit', $hospital->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ route('admin.hospitals.destroy', $hospital->id) }}"
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