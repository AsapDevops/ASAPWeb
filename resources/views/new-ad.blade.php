<x-app-layout>
    <div class="px-4 py-2">
        <form action="{{ route('profile.advertisements') }}" method="POST" enctype="multipart/form-data" class="w-full">
            @csrf

            <!-- Upload Advertisement Documents -->
            <div class="bg-white rounded-xl p-4 mb-4 border border-gray-200">
                <div class="mb-3 text-lg font-semibold" style="color:#000; font-family: 'Indie Flower', cursive;">
                    Upload Advertisement Documents
                </div>
                <div class="flex gap-4 justify-center">
                    <!-- Upload Image Button -->
                    <input type="file" id="image-upload" accept="image/*" class="hidden" name="image" />
                    <button type="button"
                        onclick="document.getElementById('image-upload').click();"
                        class="bg-[#FFA800] text-black font-semibold rounded-full px-8 py-4 text-xl"
                        style="font-family: 'Indie Flower', cursive;">
                        Upload Image
                    </button>
                    <!-- Upload Video Button -->
                    <input type="file" id="video-upload" accept="video/*" class="hidden" name="video" />
                    <button type="button"
                        onclick="document.getElementById('video-upload').click();"
                        class="bg-[#FFA800] text-black font-semibold rounded-full px-8 py-4 text-xl"
                        style="font-family: 'Indie Flower', cursive;">
                        Upload Video
                    </button>
                </div>
                <div id="media-preview" class="mt-3 text-center text-sm" style="font-family: 'Indie Flower', cursive; color: #000;"></div>
            </div>

            <!-- Advertisement Title -->
            <div class="mb-2 text-base font-semibold" style="color:#000; font-family: 'Indie Flower', cursive;">
                Advertisement Title
            </div>
            <div class="mb-4 relative">
                <input type="text" name="title" class="w-full rounded-xl border border-gray-200 py-3 px-4 text-base bg-white placeholder-[#d6cfd6] focus:outline-none text-black" placeholder="Add a Catchy title..." style="font-family: 'Indie Flower', cursive;">
            </div>

            <!-- Date and Time -->
            <div class="flex gap-4 mb-4">
                <div class="flex items-center gap-2 text-lg" style="font-family: 'Indie Flower', cursive; color: #000;">
                    <span class="text-[#FFA800] text-2xl">&#128197;</span>
                    <input
                        type="date"
                        id="ad-date"
                        name="ad-date"
                        class="rounded-xl border border-gray-200 py-2 px-3 text-base bg-white text-black focus:outline-none"
                        style="font-family: 'Indie Flower', cursive; min-width: 140px;"
                        value="{{ date('Y-m-d') }}"
                    />
                </div>
                <div class="flex items-center gap-2 text-lg" style="font-family: 'Indie Flower', cursive; color: #000;">
                    <span class="text-[#FFA800] text-2xl">&#128337;</span>
                    <input
                        type="time"
                        id="ad-time"
                        name="ad-time"
                        class="rounded-xl border border-gray-200 py-2 px-3 text-base bg-white text-black focus:outline-none"
                        style="font-family: 'Indie Flower', cursive; min-width: 100px;"
                        value="{{ date('H:i') }}"
                    />
                </div>
            </div>

            <!-- Entity Contact -->
            <div class="mb-2 text-base font-semibold" style="color:#000; font-family: 'Indie Flower', cursive;">
                Entity Contact
            </div>
            <div class="mb-4 relative">
                <input type="text" name="contact" class="w-full rounded-xl border border-gray-200 py-3 px-4 text-base bg-white placeholder-[#d6cfd6] focus:outline-none text-black" placeholder="Add contact details..." style="font-family: 'Indie Flower', cursive;">
            </div>

            <!-- Advertisement Details -->
            <div class="mb-2 text-base font-semibold" style="color:#000; font-family: 'Indie Flower', cursive;">
                Advertisement Details
            </div>
            <div class="mb-4 relative">
                <input type="text" name="details" class="w-full rounded-xl border border-gray-200 py-3 px-4 text-base bg-white placeholder-[#d6cfd6] focus:outline-none text-black" placeholder="Add more details..." style="font-family: 'Indie Flower', cursive;">
            </div>

            <!-- Advertisement Duration -->
            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <div class="mb-2 text-base font-semibold" style="color:#000; font-family: 'Indie Flower', cursive;">
                        Advertisement Duration
                    </div>
                    <div class="relative">
                        <input type="text" name="duration" class="w-full rounded-xl border border-gray-200 py-3 px-4 text-base bg-white placeholder-[#d6cfd6] focus:outline-none text-black" placeholder="Duration in Days" style="font-family: 'Indie Flower', cursive;">
                    </div>
                </div>
            </div>

            <!-- Billboard Advertisements Card -->
            <div class="bg-white rounded-xl p-4 mb-4 border border-gray-200">
                <div class="text-xl font-bold mb-2" style="font-family: 'Indie Flower', cursive; color: #000;">
                    Billboard Advertisements
                </div>
                <div class="mb-2" style="font-family: 'Indie Flower', cursive; color: #000;">
                    <span class="font-bold">COST:</span> $100/month
                </div>
                <div class="mb-2" style="font-family: 'Indie Flower', cursive; color: #000;">
                    Advertise your brand on strategic billboards around the city for maximum visibility.
                </div>
                <div class="mb-2" style="font-family: 'Indie Flower', cursive; color: #000;">
                    Approximately 10,000+ daily views
                </div>
                <div class="flex items-center gap-2 mt-2" style="font-family: 'Indie Flower', cursive; color:#bdb6b6;">
                    <input type="checkbox" name="billboard" class="w-5 h-5 rounded border-gray-300">
                    <span>Select for Billboard Advertisement</span>
                </div>
            </div>

            <!-- Online Advertisements Card -->
            <div class="bg-[#FFC2CC] rounded-xl p-4 mb-4 border border-gray-200">
                <div class="text-xl font-bold mb-2" style="font-family: 'Indie Flower', cursive; color: #000;">
                    Online Advertisements
                </div>
                <div class="mb-2" style="font-family: 'Indie Flower', cursive; color: #000;">
                    <span class="font-bold">Cost:</span> $100/month
                </div>
                <div class="mb-2" style="font-family: 'Indie Flower', cursive; color: #000;">
                    Promote your brand across our digital platforms, including social media and websites.
                </div>
                <div class="mb-2" style="font-family: 'Indie Flower', cursive; color: #000;">
                    Approximately 20,000+ monthly online impressions
                </div>
                <div class="flex items-center gap-2 mt-2" style="font-family: 'Indie Flower', cursive; color:#eab1b8;">
                    <input type="checkbox" name="online" class="w-5 h-5 rounded border-gray-300" id="online-ad-checkbox">
                    <span>Select for Online Advertisements</span>
                </div>
            </div>

            <!-- Agreement Checkbox -->
            <div class="flex items-center mb-6 mt-4">
                <input type="checkbox" id="agree" name="agree" class="w-5 h-5 rounded border-[#FFA800] bg-[#FFA800] accent-[#FFA800]" checked>
                <label for="agree" class="ml-2 text-lg" style="font-family: 'Indie Flower', cursive; color: #000;">
                    I agree to the Advertisment,
                    <a href="#" class="text-blue-700 underline">terms and conditions</a>
                </label>
            </div>

            <!-- Make Advertisement Button -->
            <div class="flex justify-center mb-8">
                <button type="#"
                    class="w-full bg-[#FFA800] text-black font-bold rounded-full py-4 text-2xl"
                    style="font-family: 'Indie Flower', cursive; letter-spacing: 1px;">
                    Make Advertisement
                </button>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('image-upload').addEventListener('change', function(e) {
            const preview = document.getElementById('media-preview');
            preview.innerHTML = '';
            if (e.target.files && e.target.files[0]) {
                const file = e.target.files[0];
                const reader = new FileReader();
                reader.onload = function(ev) {
                    preview.innerHTML = `<img src="${ev.target.result}" alt="Preview" style="max-width:200px; max-height:200px; margin:auto; border-radius:1rem;" />`;
                }
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('video-upload').addEventListener('change', function(e) {
            const preview = document.getElementById('media-preview');
            preview.innerHTML = '';
            if (e.target.files && e.target.files[0]) {
                const file = e.target.files[0];
                const url = URL.createObjectURL(file);
                preview.innerHTML = `<video controls style="max-width:200px; max-height:200px; margin:auto; border-radius:1rem;">
                    <source src="${url}" type="${file.type}">
                    Your browser does not support the video tag.
                </video>`;
            }
        });
    </script>
</x-app-layout>