<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') | {{ config('app.name') }}</title>

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
     />   <style>
        @tailwind base;
        @tailwind components;
        @tailwind utilities;
    </style>

     <link href="./css/output.css" rel="stylesheet">

    {{-- <link rel="stylesheet" href="style.css"> --}}
</head>
<body>
        <header>

        </header>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
