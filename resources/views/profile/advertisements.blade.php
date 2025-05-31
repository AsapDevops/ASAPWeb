<x-app-layout>

    <!-- Header -->
    <div class="relative flex items-center justify-center px-5 py-3 rounded-b-2xl mb-4">
        <a href="{{ route('new-ad') }}" class="absolute right-6 top-1/2 -translate-y-1/2 mt-2">
            <img src="{{ asset('drawable/add.png') }}" alt="Ad" class="h-7 w-7 cursor-pointer" />
        </a>
    </div>

    <!-- Content -->
    <div class="flex flex-col items-center justify-center h-[70vh]">
        <img src="{{ asset('drawable/advertising.png') }}" alt="Advertisement" class="w-28 h-28 mb-6 opacity-40" />
        <div class="text-center">
            <div class="text-lg font-semibold mb-2" style="color: #bdb6b6; font-family: 'Indie Flower', cursive;">
                No Advertisements made yet!
            </div>
            <div class="text-base" style="font-family: 'Indie Flower', cursive;">
                Want to advertise your Product or Event?<br>
                Create one with us and let us make it easier to<br>
                make it reach your intended audience.
            </div>
        </div>
    </div>
</x-app-layout>