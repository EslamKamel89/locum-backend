@extends('admin.layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Doctor</h4>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#main" role="tab">
                            <span class="hidden-xs-down">Main</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#additional" role="tab">
                            <span class="hidden-xs-down">Additional</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#files" role="tab">
                            <span class="hidden-xs-down">Files</span>
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane active" id="main" role="tabpanel">
                        <div class="p-20">
                            <h3>Best Clean Tab ever</h3>
                            <h4>you can use it with the small code</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="doctor-name">Doctor Name</label>
                                    <input id="doctor-name" type="text" class="form-control" name="name">
                                </div>
                                <div class="col-md-6">
                                    <label for="doctor-email">Doctor Email</label>
                                    <input id="doctor-email" type="text" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="doctor-password">Doctor Password</label>
                                    <input id="doctor-password" type="text" class="form-control" name="password">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="tel" class="form-control" name="phone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="state_id">Doctor State</label>
                                    <select id="state_id" name="state_id">
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="district_id">Doctor District</label>
                                    <select name="district_id" id="district_id">
                                        <option value="">Select District</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="birth-date">Birthday</label>
                                    <input id="birth-date" type="date" class="form-control" name="date_of_birth">
                                </div>
                                <div class="col-md-6">
                                    <label for="address">Address</label>
                                    <input id="address" type="text" class="form-control" name="address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="gender">Gender</label>
                                    <select name="gender" class="form-control" id="gender">
                                        <option value="">Select Gender</option>
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->value }}">{{ $gender->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="job_info_name">Job</label>
                                    <select name="job_info_name" id="job_info_name">
                                        <option value="">Select Job</option>
                                        @foreach ($jobInfos as $job)
                                            <option value="{{ $job->name }}">{{ $job->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="shift_preference">Shift Preference</label>
                                    <select name="shift_preference" class="form-control" id="shift_preference">
                                        <option value="">Select Shift Preference</option>
                                        @foreach ($shiftPreferences as $shift)
                                            <option value="{{ $shift->value }}">{{ $shift->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="specialty_name">Speciality</label>
                                    <select name="specialty_name" id="specialty_name">
                                        <option value="">Select Speciality</option>
                                        @foreach ($specialties as $speciality)
                                            <option value="{{ $speciality->name }}">{{ $speciality->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="langs">languages</label>
                                    <select name="langs" multiple="true" id="langs">
                                        <option value="">Select Job</option>
                                        @foreach ($langs as $lang)
                                            <option value="{{ $lang->name }}">{{ $lang->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="skills">Skills</label>
                                    <select name="skills" multiple="true" id="skills">
                                        <option value="">Select Skills</option>
                                        @foreach ($skills as $skill)
                                            <option value="{{ $skill->name }}">{{ $skill->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <input type="checkbox" name="willing_to_relocate" id="willing_to_relocate"
                                        value="1">
                                    <label for="willing_to_relocate">I am willing to relocate</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" onclick="saveDoctor()"
                            class="btn btn-info waves-effect waves-light">Save</button>
                    </div>
                    <div class="tab-pane" id="additional" role="tabpanel">
                        <div class="p-20">

                            <input type="hidden" id="doctor_id" name="doctor_id">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="professional_license_number">professional license number</label>
                                    <input id="professional_license_number" type="text" class="form-control"
                                        name="professional_license_number">
                                </div>
                                <div class="col-md-6">
                                    <label for="license_state">license state</label>
                                    <input id="license_state" type="text" class="form-control" name="license_state">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="license_issue_date">license issue date</label>
                                    <input id="license_issue_date" type="date" class="form-control"
                                        name="license_issue_date">
                                </div>
                                <div class="col-md-6">
                                    <label for="license_expiry_date">license expiry date</label>
                                    <input id="license_expiry_date" type="date" class="form-control"
                                        name="license_expiry_date">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="highest_degree">highest degree</label>
                                    <input id="highest_degree" type="text" class="form-control"
                                        name="highest_degree">
                                </div>
                                <div class="col-md-6">
                                    <label for="field_of_study">field_of study</label>
                                    <input id="field_of_study" type="text" class="form-control"
                                        name="field_of_study">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="graduation_year">graduation year</label>
                                    <input id="graduation_year" type="text" class="form-control"
                                        name="graduation_year">
                                </div>
                                <div class="col-md-6">
                                    <label for="work_experience">work experience</label>
                                    <input id="work_experience" type="text" class="form-control"
                                        name="work_experience">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="university_name">university id</label>
                                    <select name="university_name" id="university_name">
                                        <option value="">Select University</option>
                                        @foreach ($universities as $university)
                                            <option value="{{ $university->id }}">{{ $university->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="license_state">license state</label>
                                    <input id="license_state" type="text" class="form-control" name="license_state">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="biography">biography</label>
                                    <textarea id="biography"class="form-control" name="biography"> </textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" onclick="saveDoctorInfo()"
                            class="btn btn-info waves-effect waves-light">Save</button>
                    </div>
                    <div class="tab-pane" id="files" role="tabpanel">
                        <div class="p-20">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="cv">cv</label>
                                    <input id="cv" type="file" class="form-control" name="cv">
                                </div>
                                <div class="col-md-6">
                                    <label for="photo">photo</label>
                                    <input id="photo" type="file" class="form-control" name="photo">
                                </div>
                            </div>
                            {{-- Doctor Documents <!--TODO: add documents --> --}}

                            <h4 class="card-title">Doctor Documents</h4>
                            <div id="education_fields" class=" m-t-20"></div>
                            <form class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="document_name"
                                            name="document_name" placeholder="document name">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="document_type"
                                            name="document_type" placeholder="document type">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <input type="file" class="form-control" id="document_file"
                                            name="document_file" placeholder="document file">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <button class="btn btn-success" type="button" onclick="education_fields();"><i
                                                class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <button type="submit" onclick="saveDoctorFiles()"
                            class="btn btn-info waves-effect waves-light">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    function saveDoctor() {
        $.ajax({
            url: "{{ route('admin.doctors.store') }}",
            method: "POST",
            data: {
                // Users Table
                name: $("#doctor-name").val(),
                email: $("#doctor-email").val(),
                password: $("#doctor-password").val(),
                state_id: $("#state_id").val(),
                district_id: $("#district_id").val(),
                type: 'doctor',
                // Doctors Table
                specialty_name: $("#specialty_name").val(),
                job_info_name: $("#job_info_name").val(),
                date_of_birth: $("#birth-date").val(),
                // photo: $("#photo").val(), // TODO: upload photo Form Data
                gender: $("#gender").val(),
                address: $("#address").val(),
                phone: $("#phone").val(),
                shift_preference: $("#shift_preference").val(),
                langs: $("#langs").val(),
                skills: $("#skills").val(),
                willing_to_relocate: $("#willing_to_relocate").val(),
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                console.log(response);
                $('#doctor_id').val(response.data.id);
                alert(response.message);
            },
            error: function(xhr, status, error) {
                let errors = xhr.responseJSON.errors;
                console.error(errors);
                errors.forEach(error => {
                    alert(error);
                });
            }
        });
    }

    function saveDoctorInfo() {
        $.ajax({
            url: "{{ route('admin.doctor-info.store') }}",
            method: "POST",
            data: {
                // Doctor Info Table
                doctor_id: $("#doctor_id").val(),
                professional_license_number: $("#professional_license_number").val(),
                license_issue_date: $("#license_issue_date").val(),
                license_expiry_date: $("#license_expiry_date").val(),
                highest_degree: $("#highest_degree").val(),
                field_of_study: $("#field_of_study").val(),
                graduation_year: $("#graduation_year").val(),
                work_experience: $("#work_experience").val(),
                university_name: $("#university_name").val(),
                license_state: $("#license_state").val(),
                biography: $("#biography").val(),
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                console.log(response);
                alert(response.message);
            },
            error: function(xhr, status, error) {
                let errors = xhr.responseJSON.errors;
                console.error(errors);
                errors.forEach(error => {
                    alert(error);
                });
            }
        });
    }


    function saveDoctorFiles() {
        // TODO: upload files [Photo => (Doctor table), CV => (DoctorInfo table), Documents => (DoctorDocument table)]
    }
</script>
