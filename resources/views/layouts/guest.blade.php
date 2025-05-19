<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ASAP</title>
        <link rel="icon" type="image/webp" href="mipmap-mdpi/ic_launcher.webp">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-orange-100 to-orange-400 min-h-screen">
        <div class="min-h-screen flex items-center justify-center">
            <div class="bg-white rounded-2xl shadow-2xl flex w-full max-w-5xl overflow-hidden">
                <!-- Left: Form Slot -->
                <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
                    {{ $slot }}
                </div>
                <!-- Right: Illustration -->
                <div class="hidden md:flex md:w-1/2 bg-blue-100 items-center justify-center">
                    <img src="{{ asset('drawable/regpage.jpg') }}" alt="Register Illustration" class="object-cover w-full h-full" />
                </div>
            </div>
        </div>
    </body>
</html>
