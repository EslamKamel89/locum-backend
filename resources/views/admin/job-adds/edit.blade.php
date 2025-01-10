@extends('admin.layouts.master')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Hospital</h4>
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
            <form action="{{ route('admin.job-adds.update', $jobAdd->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <h4 class="card-title">User informations</h4>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="title" class="control-label col-form-label">Title</label>
                                <input value="{{ $jobAdd->title }}" type="text" class="form-control" id="title"
                                    name="title" placeholder="Title">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="speciality_id" class="control-label col-form-label">Speciality</label>
                                <select class="form-control" id="speciality_id" name="speciality_id">
                                    <option value="">Select Speciality</option>
                                    @foreach ($specialties as $speciality)
                                        <option value="{{ $speciality->id }}"
                                            {{ $jobAdd->speciality_id === $speciality->id ? 'selected' : '' }}>
                                            {{ $speciality->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="job_info_id" class="control-label col-form-label">Job Information</label>
                                <select class="form-control" id="job_info_id" name="job_info_id">
                                    <option value="">Select Job Information</option>
                                    @foreach ($jobInfos as $jobInfo)
                                        <option value="{{ $jobInfo->id }}"
                                            {{ $jobAdd->job_info_id === $jobInfo->id ? 'selected' : '' }}>
                                            {{ $jobInfo->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="job_type" class="control-label col-form-label">Job Type</label>
                                <input value="{{ $jobAdd->job_type }}" type="text" class="form-control" id="job_type"
                                    name="job_type" placeholder="Job Type">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="location" class="control-label col-form-label">Location</label>
                                <input value="{{ $jobAdd->location }}" type="text" class="form-control" id="location"
                                    name="location" placeholder="Location">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="description" class="control-label col-form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description">{{ $jobAdd->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="responsibilities" class="control-label col-form-label">Responsibilities</label>
                                <textarea class="form-control" id="responsibilities" name="responsibilities" placeholder="Responsibilities">{{ $jobAdd->responsibilities }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="qualifications" class="control-label col-form-label">Qualifications</label>
                                <textarea class="form-control" id="qualifications" name="qualifications" placeholder="Qualifications">{{ $jobAdd->qualifications }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="experience_required" class="control-label col-form-label">Experience
                                    Required</label>
                                <textarea class="form-control" id="experience_required" name="experience_required" placeholder="Experience Required">{{ $jobAdd->experience_required }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="salary_min" class="control-label col-form-label">Salary Min</label>
                                <input value="{{ $jobAdd->salary_min }}" type="number" class="form-control"
                                    id="salary_min" name="salary_min" placeholder="Salary Min">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="salary_max" class="control-label col-form-label">Salary Max</label>
                                <input value="{{ $jobAdd->salary_max }}" type="number" class="form-control"
                                    id="salary_max" name="salary_max" placeholder="Salary Max">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="benefits" class="control-label col-form-label">Benefits</label>
                                <textarea class="form-control" id="benefits" name="benefits" placeholder="Benefits">{{ $jobAdd->benefits }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="working_hours" class="control-label col-form-label">Working Hours</label>
                                <input value="{{ $jobAdd->working_hours }}" type="text" class="form-control"
                                    id="working_hours" name="working_hours" placeholder="Working Hours">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="application_deadline" class="control-label col-form-label">Application
                                    Deadline</label>
                                <input value="{{ $jobAdd->application_deadline }}" type="datetime-local"
                                    class="form-control" id="application_deadline" name="application_deadline"
                                    placeholder="Application Deadline">
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
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
