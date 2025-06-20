<section>
    {{-- Profile Card --}}
    <div class="w-11/12 mx-auto bg-white rounded-2xl shadow-md mt-6 mb-4 relative flex flex-row items-start p-4">
        <div class="flex-1">
            <div class="font-bold text-2xl mb-1">{{ $user->name }}</div>
            <div class="text-base mb-1">{{ $user->phone ?? '+254 7 ...' }}</div>
            <div class="text-base mb-3">{{ $user->email }}</div>
            {{-- Rating --}}
            <div class="bg-white rounded-xl shadow p-3 flex items-center mb-4 w-full">
                <span class="mr-4 font-semibold">Rating</span>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor"><polygon points="12,2 15,8.5 22,9.2 17,14.1 18.2,21 12,17.8 5.8,21 7,14.1 2,9.2 9,8.5"/></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor"><polygon points="12,2 15,8.5 22,9.2 17,14.1 18.2,21 12,17.8 5.8,21 7,14.1 2,9.2 9,8.5"/></svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor"><polygon points="12,2 15,8.5 22,9.2 17,14.1 18.2,21 12,17.8 5.8,21 7,14.1 2,9.2 9,8.5"/></svg>
                    <svg class="w-5 h-5 text-gray-300" fill="currentColor"><polygon points="12,2 15,8.5 22,9.2 17,14.1 18.2,21 12,17.8 5.8,21 7,14.1 2,9.2 9,8.5"/></svg>
                    <svg class="w-5 h-5 text-gray-300" fill="currentColor"><polygon points="12,2 15,8.5 22,9.2 17,14.1 18.2,21 12,17.8 5.8,21 7,14.1 2,9.2 9,8.5"/></svg>
                </div>
                <span class="ml-2 text-blue-600 font-bold">3.00</span>
            </div>
            <div class="font-bold mt-2">Category</div>
            <div class="mb-2">Car Rental</div>
            <div class="font-bold">About</div>
            <div class="mb-2">Musical Enthusiast and hardworking fellow.</div>
            <div class="font-bold">Username</div>
            <div class="font-bold text-2xl mb-1">{{ $user->name }}</div>
        </div>
        <div class="ml-4 mt-2">
            <img src="{{ asset('mipmap-xxxhdpi/ic_launcher_round.webp') }}" alt="Profile" class="w-20 h-20 rounded-full object-cover border-4 border-white shadow-lg">
        </div>
    </div>

    <!-- General Section -->
    <h2 class="text-base font-bold text-gray-900 mb-2">General</h2>
    <div class="bg-white rounded-xl shadow p-2 mb-6">
        <a href="{{ route('profile.show') }}" class="flex items-center gap-3 py-3 border-b last:border-b-0 hover:bg-gray-50 rounded transition">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16.862 3.487a2.25 2.25 0 0 1 3.182 3.182l-9.193 9.193-4.242 1.06 1.06-4.242 9.193-9.193z"></path></svg>
            <span class="font-semibold text-black">Edit Profile</span>
        </a>
        <a href="{{ route('profile.wallet') }}" class="flex items-center gap-3 py-3 border-b last:border-b-0 hover:bg-gray-50 rounded transition">
            <img src="{{ asset('drawable/wallet.png') }}" alt="Services" class="h-7 w-7" />
            <span class="font-semibold text-black">Wallet</span>
        </a>
        <a href="{{ route('chat') }}" class="flex items-center gap-3 py-3 border-b last:border-b-0 hover:bg-gray-50 rounded transition">
            <img src="{{ asset('drawable/chat.png') }}" alt="Chats" class="h-7 w-7" />
            <span class="font-semibold text-black">Chats</span>
        </a>
        <a href="{{ route('events') }}" class="flex items-center gap-3 py-3 border-b last:border-b-0 hover:bg-gray-50 rounded transition">
            <img src="{{ asset('drawable/calendar-check.png') }}" alt="Events" class="h-7 w-7" />
            <span class="font-semibold text-black">Events</span>
        </a>
        <a href="{{ route('services') }}" class="flex items-center gap-3 py-3 border-b last:border-b-0 hover:bg-gray-50 rounded transition">
            <img src="{{ asset('drawable/settings.png') }}" alt="Services" class="h-7 w-7" />
            <span class="font-semibold text-black">Services</span>
        </a>
        <a href="{{ route('profile.advertisements') }}" class="flex items-center gap-3 py-3 hover:bg-gray-50 rounded transition">
            <img src="{{ asset('drawable/advertising.png') }}" alt="Services" class="h-7 w-7" />
            <span class="font-semibold text-black">Advertisements</span>
        </a>
    </div>

    <!-- App Section -->
    <h2 class="text-base font-bold text-gray-900 mb-2">App</h2>
    <div class="bg-white rounded-xl shadow p-2">
        <div x-data="{ open: false }">
            <a href="javascript:void(0);" @click="open = !open"
               class="flex items-center gap-3 py-3 border-b last:border-b-0 hover:bg-gray-50 rounded transition">
                <img src="{{ asset('drawable/info-button.png') }}" alt="About" class="h-7 w-7" />
                <span class="font-semibold text-black">About</span>
                <svg :class="{'rotate-180': open}" class="w-4 h-4 ml-auto transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
            </a>
            <div x-show="open" x-transition class="px-2 py-3 text-black" style="font-family: 'Indie Flower', cursive;">
                <div class="text-lg font-bold mb-2">Profile</div>
                <div>
                    ASAP is a versatile event management and service booking platform, designed with features to connect event organizers and service providers, such as musicians, car rental services, photographers, and more.<br>
                    It enables seamless interactions between event creators and service providers, offering functionalities such as booking, managing events, managing payments, and user communication via chat.<br>
                    <br>
                    <b>1. User Registration and Authentication:</b><br>
                    ASAP supports registration for different types of users: Event Organizers, and Service Providers. During registration, users can choose their roles and input their details, such as category (for musicians), profile details, and contact information.<br>
                    <b>2. Service and Event Management:</b><br>
                    Event Creation: Event organizers can create events and specify the services they need, such as car rentals, sound systems, catering, and more.<br>
                    Service Provider Integration: Service providers can register their services under categories like car rentals, photography, or sound systems. The application allows service providers to add their service details.<br>
                    Event and Service Matching: ASAP allows event organizers to find and book service providers. Service providers can view events that match their service type, ensuring they see only relevant event opportunities.<br>
                    <b>3. Booking and Bid Management:</b><br>
                    Booking: Event Organizers can book service providers for their events. Once a booking is made, service providers can see the booked service package and be able to communicate with the user.<br>
                    Bidder Management: The app checks whether a particular user is listed as a bidder, ensuring the user is notified if they are part of the event.<br>
                    <b>4. Chat Functionality:</b><br>
                    The app includes a chat system where users can communicate directly. Corporate users and service providers (e.g., musicians or car rental companies) can chat about event bookings and service details.<br>
                    <b>5. Event and Booking Management:</b><br>
                    The app displays booked events and displays event details such as date, services booked, and the current status. Users can view whether their booked events are upcoming or have already passed.<br>
                    <b>6. Payment Management:</b><br>
                    The app manages payments between event organizers and service providers. When a booking is made, the payment amount is deducted from the organizer’s account and held in the app until both parties confirm that the services were completed. Once the event is confirmed, the payment is released to the service provider’s account.
                </div>
            </div>
        </div>

        <div x-data="{ open: false }">
            <a href="javascript:void(0);" @click="open = !open"
               class="flex items-center gap-3 py-3 hover:bg-gray-50 rounded transition">
                <img src="{{ asset('drawable/customer-service.png') }}" alt="Contact Us" class="h-7 w-7" />
                <span class="font-semibold text-black">Contact Us</span>
                <svg :class="{'rotate-180': open}" class="w-4 h-4 ml-auto transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
            </a>
            <div x-show="open" x-transition class="px-2 py-3 text-black" style="font-family: 'Indie Flower', cursive;">
                <hr class="my-2">
                <div class="text-red-600 mb-2" style="font-size: 1.1em;">Send Message to email below:</div>
                <div class="flex items-center gap-2 mb-2">
                    <img src="{{ asset('mipmap-xxxhdpi/ic_launcher_round.webp') }}" alt="Email" class="h-6 w-6" />
                    <span class="text-black">Mwanzmziki@gmail.com</span>
                </div>
                <div class="mb-2">Send Message to Admin:</div>
                <button class="bg-[#FFA800] text-black font-bold rounded-full px-6 py-2 text-lg" style="font-family: 'Indie Flower', cursive;">Message</button>
            </div>
        </div>
    </div>
</section>

