<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
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
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container">
                <a class="text-white navbar-brand" href="#">Locum Health</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="ml-auto navbar-nav">
                        <li class="nav-item">
                            <a class="text-white nav-link" href="{{ route('healthcare.logout') }}">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="bg-white shadow profile-header">
            <div class="row">
                <!-- Cover Photo -->
                <img src="{{ asset('dashboard/assets/images/healthcare-cover.jpg') }}" alt="Cover Photo"
                    class="cover-photo">
                <!-- Profile Picture -->
                <img src="{{ asset($hospital->photo) }}"
                    onerror="this.onerror=null; this.src='{{ asset('dashboard/assets/images/users/1.jpg') }}'"
                    alt="Profile Photo" class="profile-photo">
                <!-- Profile Info -->
            </div>
            <div class="row">
                <div class="profile-info col-md-10">
                    <h2 class="mt-5">Hospital Jobs - Healthcare Jobs</h2>
                    <p class="text-muted">Hospital Jobs & Healthcare Vacancies in Dubai UAE and Across Worldwide -Visit:
                        www.ampmlocum.com</p>
                    <a href="https://maps.app.goo.gl/Ta8JavFqLWw1Cuuq8" class="text-muted"><i
                            class="bi bi-geo-alt"></i>2083
                        43rd Hwy S
                        Harrison, Arkansas(AR), 72601</a>
                    <div class="mt-2">
                        <button class="px-5 border border-muted btn btn-primary rounded-3 font-weight-bold">
                            <i class="bi bi-plus"></i> Post Job
                        </button>

                        <button class="border border-muted btn btn-muted rounded-circle ">
                            <i class="bi bi-three-dots-vertical text-muted"></i>
                        </button>
                    </div>
                </div>

            </div>
            @include('healthcare.includes.header-nav')
        </div>

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
