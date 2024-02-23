<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        <link href="https://fonts.bunny.net/css?family=caveat-brush:400" rel="stylesheet" />

        <style>
            .welcomeFont {
                font-family: 'Caveat Brush', handwriting;
            }
        </style>

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="flex min-h-screen bg-gray-50 lg:max-h-screen dark:bg-black">
            <div class="hidden md:flex md:w-3/5">
                <img src="{{ asset('/storage/images/defaults/ivana-cajina-WPVtT0MEM00-unsplash.jpg') }}" class="w-full object-cover lg:max-h-screen" alt="">
            </div>
            @if (Route::has('login'))
                <div class="flex flex-col justify-center items-center w-full space-y-6 md:w-2/5 dark:text-gray-50">
                    <img src="{{ asset('/storage/images/defaults/car-158795_1280.png') }}" alt="" class="h-36 w-auto">
                    <span class="welcomeFont text-4xl">Coderprise</span>
                    @auth()
                        <span>
                            <a href="{{ route('dashboard') }}" class="text-2xl bg-blue-700 text-gray-50 px-4 py-2 rounded  hover:bg-blue-400">Dashboard</a>
                        </span>
                    @else
                        <span class="flex space-x-4">
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-2xl bg-blue-700 text-gray-50 px-4 py-2 rounded  hover:bg-blue-400">Register</a>
                            @endif
                            <a href="{{ route('login') }}" class="text-2xl bg-blue-700 text-gray-50 px-4 py-2 rounded  hover:bg-blue-400">Login</a>
                        </span>
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
