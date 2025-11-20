<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Universitas Doktor Nugroho')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/css/navigation.css', 'resources/css/alumni.css', 'resources/css/modern-navigation.css', 'resources/js/app.js', 'resources/js/modern-navigation.js'])
    @livewireStyles
</head>
<body class="d-flex flex-column min-vh-100">
    @include('Layout.webEssentials.navigation')
    <div class="container my-4 flex-grow-1">
        @yield('content')
    </div>
    @include('Layout.webEssentials.footer')
    @livewireScripts
</body>
</html>