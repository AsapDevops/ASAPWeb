<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-black-600 dark:text-black-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Social Login Option -->
    <div class="flex flex-col items-center mt-8">
        <div class="flex items-center w-full mt-6">
            <hr class="flex-grow border-gray-300">
            <span class="mx-4 text-gray-500">or</span>
            <hr class="flex-grow border-gray-300">
        </div>
        <div class="flex gap-4 w-full justify-center">
            <a href="{{ url('google/redirect') }}" title="Log in with Google"
                class="flex items-center justify-center w-20 h-12 border border-gray-300 bg-white rounded-lg hover:shadow transition">
                <img src="https://auth.hostinger.com/assets/images/oauth/google.svg" alt="Google" class="h-6 w-6" />
            </a>
            </a>
            <a href="#" title="Log in with Github"
                class="flex items-center justify-center w-20 h-12 bg-[#24292f] rounded-lg hover:shadow transition">
                <img src="https://auth.hostinger.com/assets/images/oauth/github.svg" alt="Github" class="h-6 w-6" />
            </a>
        </div>

    </div>
</x-guest-layout>