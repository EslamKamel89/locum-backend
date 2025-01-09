<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Profile Page</title>
    <style>
        .cover-photo {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid white;
            position: absolute;
            top: 200px;
            left: 20px;
        }

        .profile-header {
            position: relative;
            margin-bottom: 50px;
        }

        .profile-info {
            padding: 10px 20px;
        }

        .post {
            background: #fff;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-modal-size {
            max-width: 90%;
            /* أو أي نسبة مئوية أو قيمة محددة */
            width: 90%;
            /* تأكيد العرض */
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Locum Health</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('healthcare.logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="profile-header bg-white shadow">
        <!-- Cover Photo -->
        <img src="{{ asset('dashboard/assets/images/healthcare-cover.jpg') }}" alt="Cover Photo" class="cover-photo">
        <!-- Profile Picture -->
        <img src="{{ asset($hospital->photo) }}"
            onerror="this.onerror=null; this.src='{{ asset('dashboard/assets/images/users/1.jpg') }}'"
            alt="Profile Photo" class="profile-photo">
        <!-- Profile Info -->
        <div class="profile-info">
            <h2 class="mt-5">{{ Auth::user()->name }}</h2>
            <p class="text-muted">{{ Auth::user()->email }}</p>
            <div class="d-flex justify-content-start mb-3">
                <button type="button" class="btn btn-primary px-3" data-bs-toggle="modal" data-bs-target="#createJobModal">
                    Post Job
                </button>
            </div>

            <!-- Create Job Modal -->
            <div class="modal fade" id="createJobModal" tabindex="-1" aria-labelledby="createJobModalLabel"
                aria-hidden="true">
                <div class="modal-dialog custom-modal-size"
                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createJobModalLabel">Create Job</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('healthcare.adds.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Job Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="specialty_id" class="form-label">Specialty</label>
                                        <select class="form-select" id="specialty_id" name="speciality_id" required>
                                            <option value="" selected disabled>Select Specialty</option>
                                            @foreach ($specialties as $specialty)
                                                <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="job_info_id" class="form-label">Job Info</label>
                                        <select class="form-select" id="job_info_id" name="job_info_id" required>
                                            <option value="" selected disabled>Select Job Info</option>
                                            @foreach ($jobs as $jobInfo)
                                                <option value="{{ $jobInfo->id }}">{{ $jobInfo->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="job_type" class="form-label">Job Type</label>
                                            <select class="form-select" id="job_type" name="job_type" required>
                                                <option value="" selected disabled>Select Job Type</option>
                                                <option value="full_time">Full Time</option>
                                                <option value="part_time">Part Time</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="location" class="form-label">Location</label>
                                            <input type="text" class="form-control" id="location" name="location"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="responsibilities" class="form-label">Responsibilities</label>
                                            <textarea class="form-control" id="responsibilities" name="responsibilities" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="qualifications" class="form-label">Qualifications</label>
                                            <textarea class="form-control" id="qualifications" name="qualifications" rows="3" required></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="experience_required" class="form-label">Experience
                                                Required</label>
                                            <input type="text" class="form-control" id="experience_required"
                                                name="experience_required" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="salary_min" class="form-label">Minimum Salary</label>
                                            <input type="number" class="form-control" id="salary_min"
                                                name="salarymin" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="salary_max" class="form-label">Maximum Salary</label>
                                            <input type="number" class="form-control" id="salary_max"
                                                name="salarymax" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            {{-- Post Adds Button --}}

            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="setting-tab" data-bs-toggle="tab" data-bs-target="#setting"
                        type="button" role="tab" aria-controls="setting" aria-selected="true">Setting</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="job-tab" data-bs-toggle="tab" data-bs-target="#job"
                        type="button" role="tab" aria-controls="job" aria-selected="false">Job
                        Applications</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="adds-tab" data-bs-toggle="tab" data-bs-target="#adds"
                        type="button" role="tab" aria-controls="adds" aria-selected="false">Job Adds</button>
                </li>
            </ul>
        </div>

        @yield('content')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
