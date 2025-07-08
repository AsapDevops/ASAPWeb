<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ASAP</title>
    <link rel="icon" type="image/webp" href="mipmap-mdpi/ic_launcher.webp">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: #f8fafc;
        }

        .pattern-bg {
            background: repeating-linear-gradient(135deg, #f3f4f6, #f3f4f6 10px, #e5e7eb 10px, #e5e7eb 20px);
        }

        .floating-card {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            border-radius: 1rem;
        }
    </style>
</head>

<body class="pattern-bg min-h-screen flex flex-col">
    <header class="flex justify-between items-center px-8 py-6 shadow-sm">
        <div class="flex items-center gap-2">
            <img src="drawable/logos.jpeg" alt="ASAP Logo" class="h-10 w-10 rounded-full shadow" />
            <span class="font-bold text-xl tracking-tight text-gray-800"></span>
        </div>
        <div class="flex gap-1">
            <a href="{{ route('register') }}"
                class="px-4 py-2 rounded-md bg-white-600 text-black font-semibold shadow hover:bg-white-700 transition">Sign
                Up</a>
        </div>
    </header>
    <main class="flex-1 flex flex-col items-center justify-center text-center px-4 relative">
        <!-- Floating cards (optional, for extra flair) -->
        <img src="{{ asset('drawable/notes.jpeg') }}"
            alt="Note" class="floating-card absolute left-0 top-24 w-40 rotate-[-10deg] hidden md:block"
            style="z-index:1;">
        <img src="{{ asset('drawable/calendar.png') }}"
            alt="Reminder" class="floating-card absolute right-0 top-32 w-40 rotate-[8deg] hidden md:block"
            style="z-index:1;">
        <!-- Centered logo/icon -->
        <div class="flex flex-col items-center mb-8 z-10">
            <img src="drawable/logos.jpeg" alt="ASAP Logo" class="h-24 w-24 rounded-full shadow-lg mb-4" />
        </div>
        <!-- Headline -->
        <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-2">Think, plan, and track</h1>
        <h2 class="text-3xl md:text-5xl font-semibold text-gray-400 mb-6">all in one place</h2>
        <!-- Description -->
        <p class="text-lg text-gray-600 mb-8 max-w-xl mx-auto">ASAP is a versatile event management and service booking platform, designed with features to connect event organizers and service providers, such as musicians, car rental services, photographers, and more.<br>
            It enables seamless interactions between event creators and service providers, offering functionalities such as booking, managing events, managing payments, and user communication via chat.<br></p>
        <!-- CTA Button -->
        <a href="{{ route('register') }}"
            class="px-8 py-3 rounded-lg bg-white-600 text-black text-lg font-semibold shadow hover:bg-blue-700 transition">
            Get Started
        </a>
    </main>
</body>

</html>