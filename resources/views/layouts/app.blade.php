<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<!-- Exclude Header, Sidebar, Footer for Login and Register Pages -->
@if (!request()->is('login', 'register'))
    <!-- Include Header -->
    @include('layouts.header')

    <div class="container-fluid">
        <div class="row">
            <!-- Include Sidebar -->
            @include('layouts.sidebar')

            <!-- Main Content -->
            <div class="col-md-10">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    @include('layouts.footer')
@else
    <!-- For Login and Register Pages, just display content -->
    <main class="py-4">
        @yield('content')
    </main>
@endif
<!-- Bootstrap CSS -->

<!-- Bootstrap JS Bundle (includes dropdown functionality) -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
