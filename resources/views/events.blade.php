<x-app-layout>
    <div class="min-h-screen py-4" style="background-color: #F3F1ED;" 
        x-data="{
            tab: 'my',
            events: JSON.parse(localStorage.getItem('my_events') || '[]')
        }"
    >
        <!-- Header -->
        <div class="relative flex items-center justify-center px-4 py-3 rounded-b-2xl mb-4">
            <a href="{{ route('create-event') }}" class="absolute right-6 top-1/2 -translate-y-1/2">
                <img src="{{ asset('drawable/add.png') }}" alt="Add Event" class="h-7 w-7 cursor-pointer" />
            </a>
        </div>

        <!-- Tabs -->
        <div class="flex justify-center gap-2 px-2 mb-4">
            <button 
                class="px-4 py-1 rounded-full font-semibold border"
                :class="tab === 'my' ? 'bg-yellow-100 text-yellow-700 border-yellow-300' : 'bg-white text-black border-gray-200'"
                @click="tab = 'my'">
                My Events
            </button>
            <button class="px-4 py-1 rounded-full bg-white text-black font-semibold border border-gray-200">Bid Events</button>
            <button class="px-4 py-1 rounded-full bg-white text-black font-semibold border border-gray-200">Booked</button>
        </div>

        <!-- My Events Section -->
        <div class="px-4" x-show="tab === 'my'">
            <div class="font-bold text-black mb-2" style="font-family: 'Comic Sans MS', cursive;">My Events</div>
            <template x-if="events.length === 0">
                <div class="text-gray-400 italic">No events created yet.</div>
            </template>
            <template x-for="event in events" :key="event.id">
                <div class="bg-white rounded-xl shadow mb-4 p-4">
                    <div class="flex items-center mb-2">
                        <img src="{{ asset('drawable/calendar.png') }}" alt="Event" class="h-16 w-16 mr-4" />
                        <div>
                            <div class="font-bold text-lg" x-text="event.details"></div>
                            <div class="flex items-center text-sm text-gray-500 mt-1">
                                <img src='{{ asset('drawable/calendar.png') }}' class="h-4 w-4 mr-1" />
                                <span x-text="event.date"></span>
                                <img src='{{ asset('drawable/clock.png') }}' class="h-4 w-4 ml-4 mr-1" />
                                <span x-text="event.start"></span>
                                <span class="mx-1">to</span>
                                <span x-text="event.end"></span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 mt-1">
                                <img src='{{ asset('drawable/pin.png') }}' class="h-4 w-4 mr-1" />
                                <span x-text="event.location"></span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 mt-1">
                                <span class="font-bold mr-2">Category:</span>
                                <span x-text="event.category"></span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 mt-1">
                                <span class="font-bold mr-2">Amount:</span>
                                <span>Ksh.</span>
                                <span x-text="event.amount" class="ml-1"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
    <script>
        // Listen for event creation and update localStorage
        window.addEventListener('event-created', function(e) {
            let events = JSON.parse(localStorage.getItem('my_events') || '[]');
            events.push(e.detail);
            localStorage.setItem('my_events', JSON.stringify(events));
            // Force Alpine to update
            document.querySelector('[x-data]').__x.$data.events = events;
        });
    </script>
</x-app-layout>