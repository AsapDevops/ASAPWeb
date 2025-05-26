<x-app-layout>
    <div class="min-h-screen py-4" style="background-color: #F3F1ED;"
        x-data="{
            tab: 'all',
            category: 'Musicians',
            booked: [],
            categories: [
                { name: 'Musicians', icon: '{{ asset('drawable/musical-note.png') }}' },
                { name: 'Emcee', icon: '{{ asset('drawable/microphone-with-wire.png') }}' },
                { name: 'Car rental', icon: '{{ asset('drawable/car-rent.png') }}' },
                { name: 'Photography', icon: '{{ asset('drawable/camera.png') }}' },
                { name: 'Catering', icon: '{{ asset('drawable/food-cover.png') }}' },
                { name: 'Makeup', icon: '{{ asset('drawable/makeup.png') }}' },
                { name: 'Costumes', icon: '{{ asset('drawable/costume.png') }}' },
                { name: 'Sponsorship', icon: '{{ asset('drawable/sponsor.png') }}' },
                { name: 'Sound system', icon: '{{ asset('drawable/sound-system.png') }}' },
                { name: 'Studio', icon: '{{ asset('drawable/studio.png') }}' }
            ],
            services: [
                {
                    category: 'Musicians',
                    icon: '{{ asset('drawable/musical-note.png') }}',
                    name: 'Hip Hop',
                    type: 'Music',
                    price: 'Ksh. 6,000',
                    status: 'Available',
                    description: 'Venue: KICC, Day: Friday, Time: 8pm-11pm'
                },
                {
                    category: 'Musicians',
                    icon: '{{ asset('drawable/musical-note.png') }}',
                    name: 'Classical',
                    type: 'Music',
                    price: 'Ksh. 15,000',
                    status: 'Available',
                    description: 'Venue: Bomas of Kenya, Day: Saturday, Time: 6pm-9pm'
                },
                {
                    category: 'Car rental',
                    icon: '{{ asset('drawable/car-rent.png') }}',
                    name: 'Bentley Continental GT',
                    type: 'Car',
                    price: 'Ksh. 82,000',
                    status: 'Available',
                    description: 'Venue: JKIA, Day: Any, Time: 24/7'
                },
                {
                    category: 'Car rental',
                    icon: '{{ asset('drawable/car-rent.png') }}',
                    name: 'Mercedes Benz S-Class',
                    type: 'Car',
                    price: 'Ksh. 5,000',
                    status: 'Available',
                    description: 'Venue: CBD, Day: Any, Time: 24/7'
                }
            ],
            bookService(index) {
                if (!this.booked.includes(index)) {
                    this.booked.push(index);
                }
            }
        }"
    >
        <!-- Header -->
        <div class="flex items-center justify-between px-4 py-3 rounded-b-2xl mb-4">
            <a href="{{ route('payments') }}">
                <img src="{{ asset('drawable/online-shopping.png') }}" alt="Shopping" class="h-7 w-7" />
            </a>
            <a href="{{ route('profile.wallet') }}">
                <img src="{{ asset('drawable/dollar-currency-symbol.png') }}" alt="Dollar" class="h-7 w-7" />
            </a>
        </div>

        <!-- Tabs -->
        <div class="flex justify-center items-center gap-2 px-2 mb-2">
            <button 
                class="px-3 py-1 rounded-full font-semibold border"
                :class="tab === 'all' ? 'bg-yellow-100 text-black border-yellow-300' : 'bg-white text-black border-gray-200'"
                @click="tab = 'all'">
                All Services
            </button>
            <span class="text-xl font-bold text-gray-400">|</span>
            <button 
                class="px-3 py-1 rounded-full font-semibold border"
                :class="tab === 'booked' ? 'bg-yellow-100 text-black border-yellow-300' : 'bg-white text-black border-gray-200'"
                @click="tab = 'booked'">
                Booked Services
            </button>
        </div>

        <!-- Service Categories -->
        <div class="px-4 mb-2">
            <div class="font-bold text-blue-700 mb-1" style="font-family: 'Comic Sans MS', cursive;">Our services</div>
            <div class="flex gap-2 flex-wrap">
                <template x-for="cat in categories" :key="cat.name">
                    <button
                        class="flex items-center gap-1 px-3 py-1 rounded-full font-semibold border"
                        :class="category === cat.name ? 'bg-yellow-100 text-yellow-600 border-yellow-300' : 'bg-white text-black border-gray-200'"
                        @click="category = cat.name"
                        type="button"
                    >
                        <img :src="cat.icon" :alt="cat.name" class="h-5 w-5" />
                        <span x-text="cat.name"></span>
                    </button>
                </template>
            </div>
        </div>

        <!-- All Services (filtered by category) -->
        <div class="px-4" x-show="tab === 'all'">
            <div class="font-bold text-black mb-2" style="font-family: 'Comic Sans MS', cursive;" x-text="category"></div>
            <template x-for="(service, index) in services.filter(s => s.category === category)" :key="index">
                <div class="flex items-center bg-white rounded-xl shadow mb-2 p-2">
                    <img :src="service.icon" alt="" class="h-12 w-12 rounded-lg bg-gray-100 mr-3" />
                    <div class="flex-1">
                        <div class="font-bold text-black" x-text="service.name"></div>
                        <div class="text-xs text-gray-500" x-text="service.type"></div>
                        <div class="text-yellow-600 font-bold" x-text="service.price"></div>
                        <div class="text-xs text-gray-600 font-bold" x-text="service.description"></div>
                    </div>
                    <template x-if="service.status === 'Available' && !booked.includes(services.indexOf(service))">
                        <button 
                            class="text-green-400 font-semibold text-sm border border-green-400 rounded px-2 py-1 hover:bg-green-50"
                            @click="bookService(services.indexOf(service))">
                            Book
                        </button>
                    </template>
                    <template x-if="service.status === 'Booked' || booked.includes(services.indexOf(service))">
                        <span class="text-green-500 font-semibold text-sm">Booked</span>
                    </template>
                </div>
            </template>
            <template x-if="services.filter(s => s.category === category).length === 0">
                <div class="text-gray-400 italic">No services available in this category.</div>
            </template>
        </div>

        <div class="px-4" x-show="tab === 'booked'">
            <div class="font-bold text-black mb-2" style="font-family: 'Comic Sans MS', cursive;">Booked Services</div>
            <template x-if="services.filter((s, i) => (s.category === category) && (booked.includes(i) || s.status === 'Booked')).length === 0">
                <div class="text-gray-400 italic">No booked services yet in this category.</div>
            </template>
            <template x-for="(service, index) in services" :key="index">
                <div x-show="service.category === category && (booked.includes(index) || service.status === 'Booked')" class="flex items-center bg-white rounded-xl shadow mb-2 p-2">
                    <img :src="service.icon" alt="" class="h-12 w-12 rounded-lg bg-gray-100 mr-3" />
                    <div class="flex-1">
                        <div class="font-bold text-black" x-text="service.name"></div>
                        <div class="text-xs text-gray-500" x-text="service.type"></div>
                        <div class="text-yellow-600 font-bold" x-text="service.price"></div>
                    </div>
                    <span class="text-green-500 font-semibold text-sm mr-2">Booked</span>
                    <template x-if="booked.includes(index)">
                        <button
                            class="text-red-500 border border-red-400 rounded px-2 py-1 text-xs hover:bg-red-50"
                            @click="booked = booked.filter(i => i !== index)">
                            Remove
                        </button>
                    </template>
                </div>
            </template>
        </div>
    </div>
</x-app-layout>