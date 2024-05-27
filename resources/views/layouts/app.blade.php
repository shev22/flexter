<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


    @vite(['resources/js/app.js', 'resources/css/app.css'])

</head>

<body>

    @include('layouts.navigation')
    @include('layouts.menubar')

    @include('layouts.sidebar')

    <!-- Page Content -->
    <div class="container {{ session('nightmode') ? 'active' : '' }}">
        <div class="content-container">
            {{ $slot }}

        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    {{-- <script src="{{ asset('js/multislider/multislider.min.js') }}"></script> --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    {{-- <script> AOS.init();</script> --}}
</body>

</html>
