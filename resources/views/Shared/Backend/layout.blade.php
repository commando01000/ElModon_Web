<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.css" rel="stylesheet" />

    
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- <script src="{{ asset('js/mdb.min.js') }}"></script> --}}
    <title>@yield('title', 'Admin Dashboard')</title>
</head>

<body>
    <!-- Main Navigation -->
    <header>
        @include('Shared.Backend.nav')
        @include('Shared.Backend.sidebar') <!-- Include Sidebar -->
    </header>

    <!-- Main Layout -->
    <main style="margin-top: 58px;">
        <div class="container pt-4">
            @yield('content') <!-- The content from child views will be injected here -->
        </div>
    </main>

    <!-- Include Scripts (optional) -->
</body>

</html>
