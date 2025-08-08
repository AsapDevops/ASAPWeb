<nav x-data="{ open: false }" class="bg-white dark:bg-white-800 border-b border-gray-100 dark:border-gray-700" style="background-color: #F3F1ED;">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Left Section: Logo + Dropdown -->
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-black-200" />
                    </a>
                </div>
                <!-- Navigation Links as Dropdown (Left Side) -->
                <div x-data="{ navOpen: false }" class="hidden sm:flex items-center relative ml-4">
                    <button @click="navOpen = !navOpen" class="flex items-center px-4 py-2 bg-white dark:bg-white-800 rounded-md shadow hover:bg-white-100 focus:outline-none">
                        <span class="mr-2 font-semibold text-gray-700 dark:text-black-200">Menu</span>
                    </button>
                    <div x-show="navOpen" @click.away="navOpen = false" class="absolute left-0 mt-2 w-48 bg-white dark:bg-white-800 rounded-md shadow-lg z-50">
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 hover:bg-white-100 dark:hover:bg-white-700">
                            <img src="{{ asset('drawable/home-agreement.png') }}" alt="Home" class="h-5 w-5 mr-2" /> Home
                        </a>
                        <a href="{{ route('services') }}" class="flex items-center px-4 py-2 hover:bg-white-100 dark:hover:bg-white-700">
                            <img src="{{ asset('drawable/settings.png') }}" alt="Services" class="h-5 w-5 mr-2" /> Services
                        </a>
                        <a href="{{ route('chat') }}" class="flex items-center px-4 py-2 hover:bg-white-100 dark:hover:bg-white-700">
                            <img src="{{ asset('drawable/chat.png') }}" alt="Chats" class="h-5 w-5 mr-2" /> Chats
                        </a>
                        <a href="{{ route('events') }}" class="flex items-center px-4 py-2 hover:bg-white-100 dark:hover:bg-white-700">
                            <img src="{{ asset('drawable/calendar-check.png') }}" alt="Events" class="h-5 w-5 mr-2" /> Events
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Section: Settings Dropdown + Hamburger -->
            <div class="flex items-center">
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black-500 dark:text-black-400 bg-white dark:bg-white-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-white-100 dark:hover:bg-white-900 focus:outline-none focus:bg-white-100 dark:focus:bg-white-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-white-200 dark:border-white-600">
            <div class="px-4">
                <div class="font-medium text-base text-black-800 dark:text-black-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-black-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
