<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') | {{ config('app.name') }}</title>

    <link href="{{ asset('assets/css/admin_dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        @include('Shared.Backend.layout')
    </header>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
