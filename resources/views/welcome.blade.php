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
            background: linear-gradient(135deg, #ffb347 0%, #fff6e3 100%);
        }

        .gradient-btn {
            background: linear-gradient(90deg, #7f5af0 0%, #ff6ac1 100%);
            color: #fff;
        }

        .feature-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
            transition: box-shadow 0.2s;
        }

        .feature-card:hover {
            box-shadow: 0 8px 32px rgba(127, 90, 240, 0.12);
        }
    </style>
</head>

<body class="min-h-screen flex flex-col font-sans">
    <!-- Header -->
    <header class="flex justify-between items-center px-10 py-6 bg-transparent">
        <div class="flex items-center gap-3">
            <img src="{{ asset('drawable/logos.jpeg') }}" alt="Logo" class="w-10 h-10 rounded-full shadow" />
            <span class="font-bold text-lg tracking-tight text-gray-700">ASAP</span>
        </div>
        <a href="{{ route('register') }}"
            class="px-6 py-2 rounded-full gradient-btn font-semibold shadow hover:opacity-90 transition">Sign
            up</a>
    </header>
    <!-- Hero Section -->
    <main class="flex-1 flex flex-col items-center justify-center px-4">
        <div class="flex flex-col md:flex-row items-center gap-12 w-full max-w-5xl mx-auto">
            <!-- Rounded Image Only -->
            <div class="rounded-full w-56 h-56 flex items-center justify-center shadow-lg mb-8 md:mb-0 overflow-hidden bg-white">
                <img src="{{ asset('drawable/logos.jpeg') }}" alt="ASAP Icon" class="w-full h-full object-cover" />
            </div>
            <!-- Headline & Description -->
            <div class="flex-1 text-center md:text-left">
                <h1 class="text-5xl font-bold text-gray-800 mb-4 tracking-tight">Having an Event 📅?</h1>
                <p class="text-lg text-gray-500 mb-6">ASAP is a versatile event management and service booking platform,
                    designed to connect event organizers and service providers. Manage bookings, payments, and chat—all in
                    one place.</p>
            </div>
        </div>
        <!-- Feature Cards -->
        <div class="flex flex-col md:flex-row gap-6 mt-16 w-full max-w-5xl mx-auto">
            <div class="feature-card flex-1 p-8 text-center">
                <div class="mb-4">
                    <!-- Example SVG icon -->
                    <svg class="mx-auto w-10 h-10 text-pink-400" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M12 20l9-5-9-5-9 5 9 5z" />
                        <path d="M12 12V4" />
                    </svg>
                </div>
                <h3 class="font-bold text-xl mb-2 text-gray-700">Service and Event Management</h3>
                <p class="text-gray-500">Event Creation: Event organizers can create events and specify the services they need, such as car rentals, sound systems, catering, and more.<br>
                </p>
            </div>
            <div class="feature-card flex-1 p-8 text-center">
                <div class="mb-4">
                    <svg class="mx-auto w-10 h-10 text-purple-400" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M3 3v18h18" />
                        <path d="M9 17V9" />
                        <path d="M15 17V13" />
                    </svg>
                </div>
                <h3 class="font-bold text-xl mb-2 text-gray-700">Booking and Bid Management</h3>
                <p class="text-gray-500">Booking: Event Organizers can book service providers for their events. Once a booking is made, service providers can see the booked service package and be able to communicate with the user.<br>
                    Bidder Management: The app checks whether a particular user is listed as a bidder, ensuring the user is notified if they are part of the event.<br></p>
            </div>
            <div class="feature-card flex-1 p-8 text-center">
                <div class="mb-4">
                    <svg class="mx-auto w-10 h-10 text-blue-400" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M12 8v4l3 3" />
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                </div>
                <h3 class="font-bold text-xl mb-2 text-gray-700">Payment Management</h3>
                <p class="text-gray-500">The app manages payments between event organizers and service providers. When a booking is made, the payment amount is deducted from the organizer’s account and held in the app until both parties confirm that the services were completed. Once the event is confirmed, the payment is released to the service provider’s account.</p>
            </div>
        </div>
    </main>
</body>

</html>