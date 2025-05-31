<section>
    <!-- Profile Card -->
    <div class="bg-white rounded-xl shadow p-4 flex items-center gap-4 mb-6">
        <div class="flex-1">
            <div class="font-bold text-black text-lg">{{ $user->name }}</div>
            <div class="text-sm text-gray-700">{{ $user->phone ?? '+254 7 ...' }}</div>
            <div class="text-sm text-gray-700">{{ $user->email }}</div>
        </div>
        <div>
            <img src="{{ $user->profile_photo_url ?? asset('mipmap-xxxhdpi/ic_launcher_round.webp') }}" alt="Profile" class="w-16 h-16 rounded-full object-cover border border-gray-200 bg-gray-100" />
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
        <a href="#" class="flex items-center gap-3 py-3 border-b last:border-b-0 hover:bg-gray-50 rounded transition">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
            <span class="font-semibold text-black">About</span>
        </a>
        <a href="#" class="flex items-center gap-3 py-3 hover:bg-gray-50 rounded transition">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 1 1 5.82 0c0 1.657-1.343 3-3 3s-3 1.343-3 3"/></svg>
            <span class="font-semibold text-black">Contact Us</span>
        </a>
    </div>
</section>

