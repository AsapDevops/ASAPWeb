<x-app-layout>

    <!-- Header -->
    <div class="relative flex items-center justify-center px-5 py-3 rounded-b-2xl mb-4">
        <a href="{{ route('new-ad') }}" class="absolute right-6 top-1/2 -translate-y-1/2 mt-2">
            <img src="{{ asset('drawable/add.png') }}" alt="Ad" class="h-7 w-7 cursor-pointer" />
        </a>
    </div>

    <!-- Content -->
    <div class="px-4 py-2">
        @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        @if($ads->isEmpty())
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
        @else
        @foreach($ads as $ad)
        <div class="bg-white rounded-xl shadow p-4 mb-6">
            <div class="font-bold text-xl mb-2" style="font-family: 'Indie Flower', cursive;">{{ $ad->title }}</div>
            <div class="mb-1"><b>Date:</b> {{ $ad->ad_date }} <b>Time:</b> {{ $ad->ad_time }}</div>
            <div class="mb-1"><b>Contact:</b> {{ $ad->contact }}</div>
            <div class="mb-1"><b>Details:</b> {{ $ad->details }}</div>
            <div class="mb-1"><b>Duration:</b> {{ $ad->duration }}</div>
            <div class="mb-1">
                @if($ad->billboard)
                <span class="px-2 py-1 bg-yellow-200 rounded">Billboard</span>
                @endif
                @if($ad->online)
                <span class="px-2 py-1 bg-pink-200 rounded">Online</span>
                @endif
            </div>
            @if($ad->image)
            <div class="mt-2">
                <img src="{{ asset('storage/'.$ad->image) }}" alt="Ad Image" style="max-width:200px; border-radius:1rem;">
            </div>
            @endif
            @if($ad->video)
            <div class="mt-2">
                <video controls style="max-width:200px; border-radius:1rem;">
                    <source src="{{ asset('storage/'.$ad->video) }}">
                    Your browser does not support the video tag.
                </video>
            </div>
            @endif
        </div>
        @endforeach
        @endif
    </div>
</x-app-layout>