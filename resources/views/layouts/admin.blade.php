<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vite -->
    @vite([
        'resources/css/app.css',
        'resources/css/dashboard.css',
        'resources/js/app.js'
    ])

    <title>@yield('title', 'Admin Dashboard')</title>
</head>
<body>

    @yield('content')

</body>
</html>
