@extends('admin.layouts.master')

@section('content')

<h4 class="page-title">Profile Page</h4>
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="{{asset($jobApplication?->doctor?->photo)}}" class="rounded-circle"
                        width="150" />
                    <h4 class="card-title m-t-10">{{ $jobApplication?->doctor?->user?->name }}</h4>
                    <h6 class="card-subtitle">{{ $jobApplication?->doctor?->specialty?->name }}</h6>
                </center>
            </div>
            <div>
                <hr>
            </div>
            <div class="card-body">
                <small class="text-muted p-t-30 db">job information</small>
                <h6>{{ $jobApplication?->doctor?->jobInfo?->name }}</h6>

                <small class="text-muted">Email address </small>
                <h6>{{ $jobApplication?->doctor?->user?->email }}</h6>

                <small class="text-muted p-t-30 db">Phone</small>
                <h6>{{ $jobApplication?->doctor?->phone }}</h6>

                <small class="text-muted p-t-30 db">Address</small>
                <h6>{{ $jobApplication?->doctor?->address }}</h6>

                <small class="text-muted p-t-30 db">Gender</small>
                <h6>{{ $jobApplication?->doctor?->gender }}</h6>

                <small class="text-muted p-t-30 db">Date of Birth</small>
                <h6>{{ $jobApplication?->doctor?->date_of_birth }}</h6>

                <small class="text-muted p-t-30 db">Willing to Relocate</small>
                <h6>{{ $jobApplication?->doctor?->willing_to_relocate ? '✅' : '❌' }}</h6>

                <hr>
                <h4 class="m-t-10 m-b-10">Doctor Additional Information</h4>

                <small class="text-muted p-t-30 db">Languages</small>
                <h6>{{ implode(', ', $jobApplication?->doctor?->langs()->pluck('name')->toArray()) }}</h6>

                <small class="text-muted p-t-30 db">Skills</small>
                <h6>{{ implode(', ', $jobApplication?->doctor?->skills()->pluck('name')->toArray()) }}</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="{{asset($jobApplication?->jobAdd?->hospital?->photo)}}"
                        class="rounded-circle" width="150" />
                    <h4 class="card-title m-t-10">{{ $jobApplication?->jobAdd?->hospital?->user?->name }}</h4>
                    <h6 class="card-subtitle">{{ $jobApplication?->jobAdd?->hospital?->user?->email }}</h6>
                    <h6>Specialty: {{ $jobApplication?->jobAdd?->hospital?->facility_name }}</h6>
                </center>
            </div>
            <div>
                <hr>
            </div>
            <div class="card-body">
                <h4>Hospital Contact</h4>
                <small class="text-muted">Address</small>
                <h6>{{ $jobApplication?->jobAdd?->hospital?->address }}</h6>

                <small class="text-muted p-t-30 db">Contact Number</small>
                <h6>{{ $jobApplication?->jobAdd?->hospital?->contact_phone }}</h6>

                <small class="text-muted p-t-30 db">Number of Beds</small>
                <h6>{{ $jobApplication?->jobAdd?->hospital?->number_of_beds }}</h6>

                <small class="text-muted p-t-30 db">Website</small>
                <h6><a href="{{ $jobApplication?->jobAdd?->hospital?->website_url }}"
                        target="_blank">{{ $jobApplication?->jobAdd?->hospital?->website_url }}</a></h6>

                <small class="text-muted p-t-30 db">Year Established</small>
                <h6>{{ $jobApplication?->jobAdd?->hospital?->year_established }}</h6>

                <hr>
                <h4 class="m-t-10 m-b-10">Hospital Additional Information</h4>

                <small class="text-muted p-t-30 db">Type</small>
                <h6>{{ $jobApplication?->jobAdd?->hospital?->type }}</h6>

                <small class="text-muted p-t-30 db">license number</small>
                <h6>{{ $jobApplication?->jobAdd?->hospital?->hospitalInfo?->license_number }}</h6>

                <small class="text-muted p-t-30 db">license state</small>
                <h6>{{ $jobApplication?->jobAdd?->hospital?->hospitalInfo?->license_state }}</h6>

                <small class="text-muted p-t-30 db">license issue date</small>
                <h6>{{ $jobApplication?->jobAdd?->hospital?->hospitalInfo?->license_issue_date }}</h6>

                <small class="text-muted p-t-30 db">license expiry date</small>
                <h6>{{ $jobApplication?->jobAdd?->hospital?->hospitalInfo?->license_expiry_date }}</h6>

                <small class="text-muted p-t-30 db">operating hours</small>
                <h6>{{ $jobApplication?->jobAdd?->hospital?->hospitalInfo?->operating_hours }}</h6>

                <small class="text-muted p-t-30 db">services offered</small>
                <h6>{{ $jobApplication?->jobAdd?->hospital?->services_offered }}</h6>

                <small class="text-muted p-t-30 db">overview</small>
                <h6>{{ $jobApplication?->jobAdd?->hospital?->overview }}</h6>

                <hr>
                <h4 class="m-t-10 m-b-10">Hospital Documents</h4>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Document</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobApplication->jobAdd->hospital->hospitalDocuments as $document)
                            <tr>
                                <td>{{ $document->type }}</td>
                                <td>
                                    <a href="{{ asset($document->path) }}" target="_blank">{{ $document->type }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <!-- Column -->
</div>

@endsection