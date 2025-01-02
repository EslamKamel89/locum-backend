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
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Locum Health</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    {{-- <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('healthcare.profile.index') }}">Home</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('healthcare.logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Profile Header -->
    <div class="profile-header bg-white shadow">
        <!-- Cover Photo -->
        <img src="{{ asset('healthcare/assets/images/healthcare-cover.jpg') }}" alt="Cover Photo" class="cover-photo">
        <!-- Profile Picture -->
        <img src="{{ asset($hospital->photo) }}" onerror="this.onerror=null; this.src='{{ asset('dashboard/assets/images/users/1.jpg') }}'" alt="Profile Photo" class="profile-photo">
        <!-- Profile Info -->
        <div class="profile-info">
            <h2 class="mt-5">{{ Auth::user()->name }}</h2>
            <p class="text-muted">{{ Auth::user()->email }}</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="mx-4 mt-4">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">Profile</div>
                    <div class="card-body">
                        <form action="{{ route('healthcare.profile.update', Auth::user()->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-2">
                                <label for="name">username</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Name" value="{{ Auth::user()->name }}" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email" value="{{ Auth::user()->email }}" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="New Password">
                            </div>
                            <div class="form-group mb-2">
                                <label for="state_id">State</label>
                                <select name="state_id" id="state_id" class="form-control">
                                    <option value="">Select State</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}"
                                            {{ Auth::user()->state_id === $state->id ? 'selected' : '' }}>
                                            {{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="district_id">District</label>
                                <select name="district_id" id="district_id" class="form-control">
                                    <option value="">Select District</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}"
                                            {{ Auth::user()->district_id === $district->id ? 'selected' : '' }}>
                                            {{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-primary text-white">Hospital Information</div>
                    <div class="card-body">
                        <form action="{{ route('admin.hospitals.update', $hospital->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-2">
                                <label for="facility_name">Facility Name</label>
                                <input type="text" class="form-control" id="facility_name" name="facility_name"
                                    placeholder="facility_name" value="{{ $hospital->facility_name }}" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="type">Hospital Type</label>
                                <input type="text" class="form-control" id="type" name="type"
                                    placeholder="type" value="{{ $hospital->type }}" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="type">services offered</label>
                                <input type="text" class="form-control" id="services_offered" name="services_offered"
                                    placeholder="services_offered" value="{{ $hospital->services_offered }}" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="type">number of beds</label>
                                <input type="text" class="form-control" id="number_of_beds" name="number_of_beds"
                                    placeholder="number_of_beds" value="{{ $hospital->number_of_beds }}" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="type">website url</label>
                                <input type="text" class="form-control" id="website_url" name="website_url"
                                    placeholder="website_url" value="{{ $hospital->website_url }}" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="type">year established</label>
                                <input type="text" class="form-control" id="year_established"
                                    name="year_established" placeholder="year_established"
                                    value="{{ $hospital->year_established }}" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="type">overview</label>
                                <textarea class="form-control" id="overview" rows="5" name="overview" placeholder="overview">{{ $hospital->overview }}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="type">website url</label>
                                <input type="text" class="form-control" id="website_url" name="website_url"
                                    placeholder="website_url" value="{{ $hospital->website_url }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="col-md-8">
                <div class="post">
                    <h5>Job applications</h5>
                    {{-- <p class="text-muted small">2 hours ago</p> --}}
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Job title</th>
                                    <th>Company</th>
                                    <th>Location</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($hospital->jobAdds as $adds)
                                    <tr>
                                        <td>
                                            {{-- <a href="{{ route('admin.jobApplications.show', $adds->id) }}">{{ $adds->title }}</a> --}}
                                            <span>{{ $adds->title }}</a>
                                        </td>
                                        <td>{{ $adds->hospital->user->name }}</td>
                                        <td>{{ $adds->hospital->address }}</td>
                                        <td>
                                            @switch($adds->status)
                                                @case('pending')
                                                    <span class="badge badge-warning">{{ $adds->status }}</span>
                                                    @break
                                                @case('accepted')
                                                    <span class="badge badge-success">{{ $adds->status }}</span>
                                                    @break
                                                @case('rejected')
                                                    <span class="badge badge-danger">{{ $adds->status }}</span>
                                                    @break
                                                @default
                                                    <span class="badge badge-secondary">{{ $adds->status }}</span>
                                            @endswitch
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="post">
                    <h5>Recommendation hospitals</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
