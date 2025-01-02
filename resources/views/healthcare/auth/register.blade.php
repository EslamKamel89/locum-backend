<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook-like Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/css/tom-select.default.min.css">
    <link rel="stylesheet" href="{{asset('dashboard/assets/dist/js/locum.js')}}">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/js/tom-select.complete.min.js"></script>

    <style>
        body {
            background-color: #f0f2f5;
        }

        .register-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .register-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-facebook {
            background-color: #1877f2;
            color: white;
        }
    </style>
</head>

<body>

    <div class="register-container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="register-header">Register as a Healthcare Provider</h2>
        <form method="POST" action="{{ route('healthcare.register') }}">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="name" name="name" required>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="email" name="email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="mb-3">
                <select name="state_id" class="form-control" id="state_id">
                    <option value="">Select State</option>
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <select name="district_id" class="form-control" id="district_id">
                    <option value="">Select District</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
            <a href="{{ route('healthcare.login') }}" class="btn btn-outline-facebook w-100"> Login </a>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
