<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LADIARTI')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/js/app.js')
    <style>
        body {
            font-family: Arial, sans-serif;
            color: black
        }
        .navbar-custom {
            background-color: #0066ff;
        }
        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: white !important;
            font-weight: bold;
        }
        .nav-right {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>

    @include('layout.navbar')

    <main class="container my-5">
        {{ $slot }}
    </main>

    <footer class="text-center py-3 bg-light mt-5">
        <p>Create by LADIARTI</p>
    </footer>

</body>
</html>
