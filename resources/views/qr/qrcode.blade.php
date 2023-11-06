<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Detalles</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>

    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                  {!! QrCode::size(100)->generate(Request::url()); !!}
            </div>
        </div>
    </div>
</body>
</html