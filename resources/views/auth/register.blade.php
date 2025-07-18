<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="hidden" name="type" value="{{ $type ?? 'client' }}">

        <!-- Social Logins -->
        <div class="flex flex-col items-center mb-6">
            <div class="flex gap-4 w-full justify-center">
                <a href="{{ url('google/redirect') }}" title="Log in with Google"
                    class="flex items-center justify-center w-20 h-12 border border-gray-300 bg-white rounded-lg hover:shadow transition">
                    <img src="https://auth.hostinger.com/assets/images/oauth/google.svg" alt="Google" class="h-6 w-6" />
                </a>
                <a href="{{ url('facebook/redirect') }}" title="Log in with Facebook"
                    class="flex items-center justify-center w-20 h-12 bg-[#1877f2] rounded-lg hover:shadow transition">
                    <img src="https://auth.hostinger.com/assets/images/oauth/facebook.svg" alt="Facebook" class="h-6 w-6" />
                </a>
            
            </div>
            <div class="flex items-center w-full mt-6">
                <hr class="flex-grow border-gray-300">
                <span class="mx-4 text-gray-500">or</span>
                <hr class="flex-grow border-gray-300">
            </div>
        </div>

        <!-- Name -->

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-black-600 dark:text-black-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>