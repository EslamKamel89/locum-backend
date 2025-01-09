<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-color: #222;
            color: #fff;
        }
    </style>
</head>
<body>
    <div style="text-align: center; padding: 20px;">
        <h1>Error {{ $code }}</h1>
        <p>{{ $message }}</p>
    </div>
</body>
</html>
