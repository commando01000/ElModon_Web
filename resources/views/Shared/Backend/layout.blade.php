<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/admin_dashboard.css') }}" rel="stylesheets">
    <title>Admin Dashboard</title>
</head>

<body>
    <!-- Main Navigation -->
    <header>

        @include('Shared.Backend.nav')
        @include('Shared.Backend.sidebar')

    </header>
    <!-- Main Navigation -->

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4"></div>
    </main>
</body>

</html>
