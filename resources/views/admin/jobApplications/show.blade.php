@extends('admin.layouts.master')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit JobApplication</h4>
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
        </div>
        <hr>
        <form action="{{ route('admin.jobApplications.update', $jobApplication->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <h4 class="card-title">User informations</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="name" class="control-label col-form-label">username</label>
                            <input value="{{ $jobApplication->user->name }}" type="text" class="form-control" id="name"
                                name="name" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="email" class="control-label col-form-label">Email</label>
                            <input value="{{ $jobApplication->user->email }}" type="email" class="form-control" id="email"
                                name="email" placeholder="Doctor Email">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="password" class="control-label col-form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Doctor Password">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="type" class="control-label col-form-label">type</label>
                            <input value="{{ $jobApplication->type }}" type="text" class="form-control" id="type" name="type"
                                placeholder="Type">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="state_id" class="control-label col-form-label">State</label>
                            <select class="" id="state_id" name="state_id">
                                <option value="">Select State</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}" {{ $jobApplication->user->state_id === $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="district_id" class="control-label col-form-label">District</label>
                            <select class="" id="district_id" name="district_id">
                                <option value="">Select District</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}" {{ $jobApplication->user->district_id === $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <h4 class="card-title">JobApplication informations</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="facility_name" class="control-label col-form-label">facility name</label>
                            <input value="{{ $jobApplication->facility_name }}" type="text" class="form-control"
                                id="facility_name" name="facility_name" placeholder="facility name">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="photo" class="control-label col-form-label">photo</label>
                            <input value="{{ $jobApplication->photo }}" type="file" name="photo" id="photo"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="Skills" class="control-label col-form-label">services offered</label>
                            <input value="{{ $jobApplication->services_offered }}" type="text" class="form-control"
                                id="services_offered" name="services_offered" placeholder="services offered">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="Skills" class="control-label col-form-label">number of beds</label>
                            <input value="{{ $jobApplication->number_of_beds }}" type="text" class="form-control"
                                id="number_of_beds" name="number_of_beds" placeholder="number of beds">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="Skills" class="control-label col-form-label">website url</label>
                            <input value="{{ $jobApplication->website_url }}" type="text" class="form-control"
                                id="website_url" name="website_url" placeholder="website url">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="Skills" class="control-label col-form-label">year established</label>
                            <input value="{{ $jobApplication->year_established }}" type="number" class="form-control"
                                id="year_established" name="year_established" placeholder="year established">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="Skills" class="control-label col-form-label">services offered</label>
                            <textarea type="number" class="form-control" id="services_offered" name="services_offered"
                                placeholder="services offered">{{ $jobApplication->services_offered }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="Skills" class="control-label col-form-label">overview</label>
                            <textarea type="number" class="form-control" id="overview" name="overview"
                                placeholder="overview">{{ $jobApplication->overview }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <h4 class="card-title">JobApplication Contact informations</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="contact_person" class="control-label col-form-label">contact person</label>
                            <input type="text" class="form-control" name="contact_person" id="contact_person"
                                value="{{ $jobApplication->contact_person }}" placeholder="contact person">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="contact_email" class="control-label col-form-label">contact email</label>
                            <input type="text" class="form-control" name="contact_email" id="contact_email"
                                value="{{ $jobApplication->contact_email }}" placeholder="contact email">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="contact_phone" class="control-label col-form-label">contact phone</label>
                            <input type="text" class="form-control" name="contact_phone" id="contact_phone"
                                value="{{ $jobApplication->contact_phone }}" placeholder="contact phone">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="address" class="control-label col-form-label">address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="address"
                                value="{{ $jobApplication->address }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="action-form">
                    <div class="form-group m-b-0 text-right">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection