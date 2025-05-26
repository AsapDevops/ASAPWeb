<x-app-layout>
    <div class="min-h-screen py-4 px-4" style="background-color: #F3F1ED;">
        <form id="eventForm" autocomplete="off">
            <!-- Event Details Header -->
            <div class="font-bold text-xl mb-4" style="font-family: 'Comic Sans MS', cursive; color: #bdb6c7;">
                Event Details
            </div>

            <!-- Event Details Input -->
            <div class="bg-white rounded-xl shadow px-4 py-3 mb-4">
                <input 
                    type="text" 
                    id="details"
                    placeholder="Event Details" 
                    class="w-full bg-transparent text-lg font-semibold text-gray-400 outline-none border-0 placeholder-gray-300"
                    style="font-family: 'Comic Sans MS', cursive;"
                    required
                />
            </div>

            <!-- Date & Time -->
            <div class="flex items-center gap-6 mb-4">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('drawable/calendar.png') }}" alt="Date" class="h-7 w-7" />
                    <input 
                        type="date" 
                        id="date"
                        class="bg-transparent border-0 text-gray-400 font-semibold outline-none"
                        style="font-family: 'Comic Sans MS', cursive;"
                        required
                    />
                </div>
                <div class="flex items-center gap-5">
                    <img src="{{ asset('drawable/clock.png') }}" alt="Time" class="h-7 w-7" />
                    <input 
                        type="time" 
                        id="start"
                        class="bg-transparent border-0 text-gray-400 font-semibold outline-none w-30"
                        style="font-family: 'Comic Sans MS', cursive;"
                        required
                    />
                    <span class="text-gray-400 font-bold">to</span>
                    <input 
                        type="time" 
                        id="end"
                        class="bg-transparent border-0 text-gray-400 font-semibold outline-none w-30"
                        style="font-family: 'Comic Sans MS', cursive;"
                        required
                    />
                </div>
            </div>

            <!-- Location -->
            <div class="flex items-center gap-2 mb-4">
                <img src="{{ asset('drawable/pin.png') }}" alt="Location" class="h-7 w-7" />
                <input 
                    type="text" 
                    id="location"
                    placeholder="Type location" 
                    class="bg-transparent border-0 text-lg text-gray-400 font-semibold outline-none"
                    style="font-family: 'Comic Sans MS', cursive;"
                    required
                />
            </div>

            <!-- Category -->
            <div class="mb-4">
                <div class="font-bold text-lg mb-1" style="font-family: 'Comic Sans MS', cursive;">Category</div>
                <select id="category" class="w-full bg-transparent border-0 text-black-400 font-semibold outline-none" style="font-family: 'Comic Sans MS', cursive;" required>
                    <option disabled selected value="">Select Category</option>
                    <option>Musician</option>
                    <option>Emcee</option>
                    <option>Car rental</option>
                    <option>Photography</option>
                    <option>Catering</option>
                    <option>Makeup</option>
                    <option>Costumes</option>
                    <option>Sponsorship</option>
                    <option>Sound system</option>
                    <option>Studio</option>      
                </select>
            </div>

            <!-- Amount -->
            <div class="mb-4">
                <div class="font-bold text-lg mb-1" style="font-family: 'Comic Sans MS', cursive;">Amount</div>
                <div class="flex items-center gap-2">
                    <span class="text-2xl font-bold text-gray-700">$</span>
                    <span class="text-gray-400 font-bold" style="font-family: 'Comic Sans MS', cursive;">Ksh.</span>
                    <input 
                        type="number" 
                        id="amount"
                        placeholder="Amt" 
                        class="bg-transparent border-0 text-lg text-black-400 font-semibold outline-none"
                        style="font-family: 'Comic Sans MS', cursive; width: 100px;"
                        required
                    />
                </div>
            </div>
            <button type="submit" class="mt-4 px-6 py-2 bg-yellow-400 text-white rounded font-bold">Create Event</button>
        </form>
    </div>
    <script>
        document.getElementById('eventForm').onsubmit = function(e) {
            e.preventDefault();
            const event = {
                id: Date.now(),
                details: document.getElementById('details').value,
                date: document.getElementById('date').value,
                start: document.getElementById('start').value,
                end: document.getElementById('end').value,
                location: document.getElementById('location').value,
                category: document.getElementById('category').value,
                amount: document.getElementById('amount').value
            };
            let events = JSON.parse(localStorage.getItem('my_events') || '[]');
            events.push(event);
            localStorage.setItem('my_events', JSON.stringify(events));
            window.location.href = "{{ route('events') }}";
        };
    </script>
</x-app-layout>