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
        <form action="{{ route('admin.job-adds.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title">User informations</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="title" class="control-label col-form-label">title</label>
                            <input value="{{ old('title') }}" type="text" class="form-control" id="title" name="title"
                                placeholder="Job title">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="hospital_id" class="control-label col-form-label">Hospital</label>
                            <select name="hospital_id" id="hospital_id" class="form-control">
                                <option value="">Select Hospital</option>
                                @foreach ($hospitals as $hospital)
                                    <option value="{{ $hospital->id }}">{{ $hospital->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="speciality_id" class="control-label col-form-label">speciality</label>
                            <select name="speciality_id" id="speciality_id" class="form-control">
                                <option value="">Select Speciality</option>
                                @foreach ($specialties as $speciality)
                                    <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="job_info_id" class="control-label col-form-label">job info</label>
                            <select id="job_info_id" name="job_info_id" class="form-control">
                                <option value="">Select job info</option>
                                @foreach ($jobInfos as $job)
                                    <option value="{{ $job->id }}">{{ $job->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="job_type" class="control-label col-form-label">Job Type</label>
                            <input value="{{ old('job_type') }}" type="text" class="form-control" id="job_type" name="job_type"
                                placeholder="Job Type">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="location" class="control-label col-form-label">Location</label>
                            <input value="{{ old('location') }}" type="text" class="form-control" id="location" name="location"
                                placeholder="Location">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="description" class="control-label col-form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="responsibilities" class="control-label col-form-label">Responsibilities</label>
                            <textarea class="form-control" id="responsibilities" name="responsibilities" placeholder="Responsibilities">{{ old('responsibilities') }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="qualifications" class="control-label col-form-label">Qualifications</label>
                            <textarea class="form-control" id="qualifications" name="qualifications" placeholder="Qualifications">{{ old('qualifications') }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="experience_required" class="control-label col-form-label">Experience Required</label>
                            <input value="{{ old('experience_required') }}" type="text" class="form-control" id="experience_required" name="experience_required"
                                placeholder="Experience Required">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="salary_min" class="control-label col-form-label">Salary Min</label>
                            <input value="{{ old('salary_min') }}" type="number" class="form-control" id="salary_min" name="salary_min"
                                placeholder="Salary Min">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="salary_max" class="control-label col-form-label">Salary Max</label>
                            <input value="{{ old('salary_max') }}" type="number" class="form-control" id="salary_max" name="salary_max"
                                placeholder="Salary Max">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="benefits" class="control-label col-form-label">Benefits</label>
                            <textarea class="form-control" id="benefits" name="benefits" placeholder="Benefits">{{ old('benefits') }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="working_hours" class="control-label col-form-label">Working Hours</label>
                            <textarea class="form-control" id="working_hours" name="working_hours" placeholder="Working Hours">{{ old('working_hours') }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="application_deadline" class="control-label col-form-label">Application Deadline</label>
                            <input value="{{ old('application_deadline') }}" type="date" class="form-control" id="application_deadline" name="application_deadline"
                                placeholder="Application Deadline">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="required_documents" class="control-label col-form-label">Required Documents</label>
                            <textarea class="form-control" id="required_documents" name="required_documents" placeholder="Required Documents">{{ old('required_documents') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
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
