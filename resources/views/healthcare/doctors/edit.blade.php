@extends('admin.layouts.master')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Doctor</h4>
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
        <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <h4 class="card-title">Doctor Basic</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="name" class="control-label col-form-label">name</label>
                            <input value="{{ $doctor->user->name }}" type="text" class="form-control" id="name"
                                name="name" placeholder="Doctor Name">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="email" class="control-label col-form-label">Email</label>
                            <input value="{{ $doctor->user->email }}" type="email" class="form-control" id="email"
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
                            <label for="gender" class="control-label col-form-label">gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="">Select gender</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->name }}" {{ $doctor->gender->name === $gender->name ? 'selected' : '' }}>{{ $gender->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="phone" class="control-label col-form-label">phone</label>
                            <input value="{{ $doctor->phone }}" type="text" class="form-control" id="phone" name="phone"
                                placeholder="phone">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="date_of_birth" class="control-label col-form-label">birth day</label>
                            <input value="{{ $doctor->date_of_birth->toDateString() }}" type="date" class="form-control"
                                id="date_of_birth" name="date_of_birth" placeholder="birth day">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="address" class="control-label col-form-label">address</label>
                            <input value="{{ $doctor->address }}" type="text" class="form-control" id="address"
                                name="address" placeholder="address">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="state_id" class="control-label col-form-label">State</label>
                            <select class="" id="state_id" name="state_id">
                                <option value="">Select State</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}" {{ $doctor->user->state_id === $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
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
                                    <option value="{{ $district->id }}" {{ $doctor->user->district_id === $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="photo" class="control-label col-form-label">photo</label>
                            <input value="{{ $doctor->photo }}" type="file" name="photo" id="photo"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <h4 class="card-title">Doctor Additionals</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="professional_license_number" class="control-label col-form-label">professional
                                license number</label>
                            <input value="{{ $doctor?->doctorInfo?->professional_license_number }}" type="text"
                                class="form-control" id="professional_license_number" name="professional_license_number"
                                placeholder="professional license number">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="license_state" class="control-label col-form-label">license state</label>
                            <input value="{{ $doctor?->doctorInfo?->license_state }}" type="text" class="form-control"
                                id="license_state" name="license_state" placeholder="license state">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="license_issue_date" class="control-label col-form-label">license issue
                                date</label>
                            <input value="{{ $doctor?->doctorInfo?->license_issue_date?->toDateString() }}" type="date"
                                class="form-control" id="license_issue_date" name="license_issue_date"
                                placeholder="license issue date">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="license_expiry_date" class="control-label col-form-label">license expiry
                                date</label>
                            <input value="{{ $doctor?->doctorInfo?->license_expiry_date?->toDateString() }}" type="date"
                                class="form-control" id="license_expiry_date" name="license_expiry_date"
                                placeholder="license expiry date">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="highest_degree" class="control-label col-form-label">highest degree</label>
                            <input value="{{ $doctor?->doctorInfo?->highest_degree }}" type="text" class="form-control"
                                id="highest_degree" name="highest_degree" placeholder="highest degree">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="field_of_study" class="control-label col-form-label">field of study</label>
                            <input value="{{ $doctor?->doctorInfo?->field_of_study }}" type="text" class="form-control"
                                id="field_of_study" name="field_of_study" placeholder="field of study">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="graduation_year" class="control-label col-form-label">graduation year</label>
                            <input value="{{ $doctor?->doctorInfo?->graduation_year }}" type="number"
                                class="form-control" id="graduation_year" name="graduation_year"
                                placeholder="graduation year">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="work_experience" class="control-label col-form-label">work experience</label>
                            <input value="{{ $doctor?->doctorInfo?->work_experience }}" type="text" class="form-control"
                                id="work_experience" name="work_experience" placeholder="work experience">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="cv" class="control-label col-form-label">cv</label>
                            <input value="{{ $doctor?->doctorInfo?->cv }}" type="file" class="form-control" id="cv"
                                name="cv" placeholder="cv">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="Skills" class="control-label col-form-label">Skills</label>
                            <select class="my-select" multiple="multiple" style="height: 36px;width: 100%;" id="skills"
                                name="skills[]">
                                <option value="">Select Skills</option>
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill->name }}" {{ $doctor->skills->contains($skill->id) ? 'selected' : '' }}>{{ $skill->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="Langs" class="control-label col-form-label">Langs</label>
                            <select class="my-select" multiple="multiple" style="height: 36px;width: 100%;" id="langs"
                                name="langs[]">
                                <option value="">Select Langs</option>
                                @foreach ($langs as $lang)
                                    <option value="{{ $lang->name }}" {{ $doctor->langs->contains($lang->id) ? 'selected' : '' }}>{{ $lang->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="specialty_name" class="control-label col-form-label">specialties</label>
                            <select class="" id="specialty_name" name="specialty_name">
                                <option value="">Select specialties</option>
                                @foreach ($specialties as $specialty)
                                    <option value="{{ $specialty->name }}" {{ $doctor->specialty_id === $specialty->id ? 'selected' : '' }}>{{ $specialty->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="job_info_name" class="control-label col-form-label">jobs</label>
                            <select class="" id="job_info_name" name="job_info_name">
                                <option value="">Select jobs</option>
                                @foreach ($jobInfos as $job)
                                    <option value="{{ $job->name }}" {{ $doctor->job_info_id === $job->id ? 'selected' : '' }}>{{ $job->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="shift_preference" class="control-label col-form-label">shift preference</label>
                            <select class="form-control" id="shift_preference" name="shift_preference">
                                <option value="">Select shift preference</option>
                                @foreach ($shiftPreferences as $shift)
                                    <option value="{{ $shift->name }}" {{ $doctor->shift_preference === $shift->name ? 'selected' : '' }}>{{ $shift->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="university_id" class="control-label col-form-label">university</label>
                            <select class="" id="university_id" name="university_id">
                                <option value="">Select university</option>
                                @foreach ($universities as $university)
                                    <option value="{{ $university->id }}" {{ $doctor?->doctorInfo?->university_id === $university->id ? 'selected' : '' }}>
                                        {{ $university->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="biography" class="control-label col-form-label">biography</label>
                            <textarea class="form-control" placeholder="biography" rows="5" name="biography"
                                id="biography">{{ $doctor?->doctorInfo?->biography }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="willing_to_relocate" class="control-label col-form-label">willing to
                                relocate</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="willing_to_relocate"
                                    name="willing_to_relocate" {{ $doctor->willing_to_relocate ? 'checked' : '' }}>
                                <label class="form-check-label" for="willing_to_relocate">I am willing to
                                    relocate</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="documents" class="control-label col-form-label">Documents</label>
                            @foreach($doctor?->doctorDocuments as $document)
                                <div id="repeater-list" class="mt-2">
                                    <div class="repeater-item mb-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                name="documents[{{ $loop->index }}][document_name]" placeholder="Document Name"
                                                value="{{ $document->name }}" />
                                            <input type="text" class="form-control"
                                                name="documents[{{ $loop->index }}][document_type]" placeholder="Document Type"
                                                value="{{ $document->type }}" />
                                            <input type="file" class="form-control" placeholder="Document File"
                                                name="documents[{{ $loop->index }}][document_file]" />
                                            <span class="input-group-append" id="basic-addon2">
                                                <button class="btn btn-danger remove-item" type="button">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <button type="button" id="add-repeater-item" class="btn btn-success mt-2">
                                <i class="fas fa-plus"></i> Add
                            </button>
                        </div>
                    </div>
                </div> -->
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