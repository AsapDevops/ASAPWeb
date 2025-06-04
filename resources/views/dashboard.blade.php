<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 dark:text-black-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 py-8">
        <div class="grid grid-cols-1 gap-8">
            <!-- Post 1 -->
            <div class="bg-white rounded-lg shadow-md w-[32rem] mx-auto">
                <div class="w-full aspect-[1/1]">
                    <img src="{{ asset('drawable/regpage.jpg') }}" alt="Post Image 1" class="w-full h-full object-cover rounded-t-lg">
                </div>
                <div class="px-4 py-2">
                    <div class="font-semibold text-sm mb-1">271 likes</div>
                    <div class="flex flex-row items-center space-x-4 mb-2">
                        <button>
                            <img src="{{ asset('drawable/love.png') }}" alt="Like" class="w-7 h-7">
                        </button>
                        <button>
                            <img src="{{ asset('drawable/speech-bubble.png') }}" alt="Comment" class="w-7 h-7">
                        </button>
                        <button>
                            <img src="{{ asset('drawable/send.png') }}" alt="Share" class="w-7 h-7">
                        </button>
                    </div>
                    <div class="text-sm text-gray-600 mb-1 cursor-pointer hover:underline">View all comments</div>
                    <input type="text" class="w-full border-none focus:ring-0 text-sm text-gray-800 bg-gray-100 rounded px-2 py-1" placeholder="Add a comment...">
                </div>
            </div>
            <!-- Post 2 -->
            <div class="bg-white rounded-lg shadow-md w-[32rem] mx-auto">
                <div class="w-full aspect-[1/1]">
                    <img src="{{ asset('drawable/Revised Poster.jpg') }}" alt="Post Image 2" class="w-full h-full object-cover rounded-t-lg">
                </div>
                <div class="px-4 py-2">
                    <div class="font-semibold text-sm mb-1">0 likes</div>
                    <div class="flex flex-row items-center space-x-4 mb-2">
                        <button>
                            <img src="{{ asset('drawable/love.png') }}" alt="Like" class="w-7 h-7">
                        </button>
                        <button>
                            <img src="{{ asset('drawable/speech-bubble.png') }}" alt="Comment" class="w-7 h-7">
                        </button>
                        <button>
                            <img src="{{ asset('drawable/send.png') }}" alt="Share" class="w-7 h-7">
                        </button>
                    </div>
                    <div class="text-sm text-gray-600 mb-1 cursor-pointer hover:underline">View all comments</div>
                    <input type="text" class="w-full border-none focus:ring-0 text-sm text-gray-800 bg-gray-100 rounded px-2 py-1" placeholder="Add a comment...">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
