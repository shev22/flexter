<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
      
        <!-- Scripts -->
        @vite([ 'resources/js/app.js','resources/css/style.css', 'resources/js/main.js', ])
    
    </head>
    <body>
     
            @include('layouts.navigation')
            @include('layouts.sidebar')
            @include('layouts.menubar')

            <!-- Page Heading -->
            {{-- @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        
            {{-- <script src="https://cdn.jsdelivr.net/npm/webtorrent@latest/webtorrent.min.js"></script> --}}
            {{-- <script src="https://cdn.jsdelivr.net/npm/@webtor/embed-sdk-js/dist/index.min.js" charset="utf-8" async></script> --}}
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  
           <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.js"></script> 
            <script src="{{ asset('js/multislider/jquery-2.2.4.min.js') }}" ></script>
          <script src="{{ asset('js/multislider/multislider.min.js') }}"></script>  
       
      
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  --}}
        <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.js"></script> 
    </body>
</html>
