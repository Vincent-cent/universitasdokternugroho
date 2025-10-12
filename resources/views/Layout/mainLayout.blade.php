<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Universitas Doktor Nugroho')</title>
    @vite(['resources/css/app.css', 'resources/css/navigation.css', 'resources/css/alumni.css', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100">
    @include('Layout.webEssentials.navigation')
    <div class="container my-4 flex-grow-1">
        @yield('content')
    </div>
    @include('Layout.webEssentials.footer')
</body>
</html>