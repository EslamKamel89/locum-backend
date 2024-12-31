@extends('admin.layouts.master')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create Hospital</h4>
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
        <form action="{{ route('admin.hospitals.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title">User informations</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="name" class="control-label col-form-label">username</label>
                            <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name"
                                placeholder="Username">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="email" class="control-label col-form-label">Email</label>
                            <input value="{{ old('email') }}" type="email" class="form-control" id="email" name="email"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="password" class="control-label col-form-label">Password</label>
                            <input value="{{ old('password') }}" type="password" class="form-control" id="password"
                                name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="type" class="control-label col-form-label">type</label>
                            <input value="{{ old('type') }}" type="text" class="form-control" id="type" name="type"
                                placeholder="Type">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="state_id" class="control-label col-form-label">State</label>
                            <select class="" id="state_id" name="state_id">
                                <option value="">Select State</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="district_id" class="control-label col-form-label">District</label>
                            <select class="district_id" id="district_id" name="district_id">
                                <option value="">Select District</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <h4 class="card-title">Hospital informations</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="facility_name" class="control-label col-form-label">facility name</label>
                            <input value="{{ old('facility_name') }}" type="text" class="form-control"
                                id="facility_name" name="facility_name" placeholder="facility name">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="photo" class="control-label col-form-label">photo</label>
                            <input value="{{ old('photo') }}" type="file" name="photo" id="photo" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="Skills" class="control-label col-form-label">services offered</label>
                            <input value="{{ old('services_offered') }}" type="text" class="form-control"
                                id="services_offered" name="services_offered" placeholder="services offered">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="Skills" class="control-label col-form-label">number of beds</label>
                            <input value="{{ old('number_of_beds') }}" type="text" class="form-control"
                                id="number_of_beds" name="number_of_beds" placeholder="number of beds">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="Skills" class="control-label col-form-label">website url</label>
                            <input value="{{ old('website_url') }}" type="text" class="form-control" id="website_url"
                                name="website_url" placeholder="website url">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="Skills" class="control-label col-form-label">year established</label>
                            <input value="{{ old('year_established') }}" type="number" class="form-control"
                                id="year_established" name="year_established" placeholder="year established">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="Skills" class="control-label col-form-label">services offered</label>
                            <textarea type="number" class="form-control" id="services_offered" name="services_offered"
                                placeholder="services offered">{{ old('services_offered') }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="Skills" class="control-label col-form-label">overview</label>
                            <textarea type="number" class="form-control" id="overview" name="overview"
                                placeholder="overview">{{ old('overview') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <h4 class="card-title">Hospital Contact informations</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="contact_person" class="control-label col-form-label">contact person</label>
                            <input type="text" class="form-control" name="contact_person" id="contact_person"
                                placeholder="contact person">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="contact_email" class="control-label col-form-label">contact email</label>
                            <input type="text" class="form-control" name="contact_email" id="contact_email"
                                placeholder="contact email">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="contact_phone" class="control-label col-form-label">contact phone</label>
                            <input type="text" class="form-control" name="contact_phone" id="contact_phone"
                                placeholder="contact phone">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="address" class="control-label col-form-label">address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="address">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- <div class="card-body">
                <h4 class="card-title">Hospital Documents</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="documents" class="control-label col-form-label">Documents</label>
                            <div id="repeater-list" class="mt-2">
                                <div class="repeater-item mb-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="documents[0][document_name]"
                                            placeholder="Document Name" />
                                        <input type="text" class="form-control" name="documents[0][document_type]"
                                            placeholder="Document Type" />
                                        <input type="file" class="form-control" placeholder="Document File"
                                            name="documents[0][document_file]" />
                                        <span class="input-group-append" id="basic-addon2">
                                            <button class="btn btn-danger remove-item" type="button">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="add-repeater-item" class="btn btn-success mt-2">
                                <i class="fas fa-plus"></i> Add
                            </button>
                        </div>
                    </div>
                </div>
            </div> -->
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