<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.default.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Add Awesomplete CSS -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.min.css" /> --}}

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

        /* تخصيص شكل الـ datalist */
        #address-suggestions {
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
</head>

<body class="bg-light" id="captureDiv">
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
                            <a class="text-white nav-link" href="{{ route('admin.logout') }}">Logout</a>
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
                    <h2 class="mt-5">{{ $hospital->facility_name }} - Healthcare Jobs <a href=""></a></h2>
                    <p class="text-muted">Hospital Jobs & Healthcare Vacancies in Dubai UAE and Across Worldwide -Visit:
                        <a href="{{ $hospital->website_url }}" target="_blank">{{ $hospital->website_url }}</a>
                    </p>
                    <a href="https://www.google.com/maps?q={{ request()->session()->get('lat') }},{{ request()->session()->get('lon') }}"
                        target="_blank" class="text-muted"><i class="bi bi-geo-alt"></i>{{ $hospital->address }}</a>
                    <div class="mt-2">
                        <button type="button"
                            class="px-5 border border-muted btn btn-primary rounded-3 font-weight-bold"
                            data-bs-toggle="modal" data-bs-target="#details">

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

        {{-- Job Detail  --}}

        @include('healthcare.modals.job-detail')
        @include('healthcare.modals.job-compensation')
        @include('healthcare.modals.job-requirements')
        @include('healthcare.modals.job-type')
        @include('healthcare.modals.job-additional')

        {{-- /Job Detail --}}

    </div>
    {{-- <button id="downloadBtn">Capture and Download</button> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        document.getElementById('downloadBtn').addEventListener('click', function() {
            var element = document.getElementById('captureDiv');
            html2canvas(element).then(function(canvas) {
                var link = document.createElement('a');
                link.download = 'captured-image.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- jQuery and jQuery UI for autocomplete -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Add Awesomplete JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.select2-multiple').forEach(function(select) {
                new TomSelect(select, {
                    plugins: ['checkbox_options'],
                    placeholder: 'Select Options',
                    closeAfterSelect: false,
                    allowEmptyOption: true,
                    create: true
                });
            });
        });
    </script>
</body>

</html>
