<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="darkMode()" :class="{ 'dark': dark }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'Welcome')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Additional Head Content -->
    @stack('head')
</head>
<body class="bg-gray-50 dark:bg-dark-bg text-gray-900 dark:text-dark-text antialiased">
    <!-- Top Bar: Logo + Search + Sign Up -->
    <div class="bg-[#EEF1D5] border-b border-transparent sticky top-0 z-50">
        <div class="container-responsive h-14 py-0 flex items-center justify-between gap-4 relative">
            <!-- Brand Logo Placeholder -->
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <div class="h-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-auto" />
                </div>
            </a>

            <!-- Search -->
            <!-- Right side: Search + Sign Up -->
            <div class="flex items-center gap-3">
                <form action="#" method="GET" class="hidden md:flex">
                    <div class="w-[200px] max-w-[50vw] relative">
                        <input type="text" name="q" placeholder="Search..." class="w-full rounded-full bg-white border border-gray-200 px-5 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-emerald-600" />
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/></svg>
                        </span>
                    </div>
                </form>
                <!-- Mobile inline search -->
                <form action="#" method="GET" class="md:hidden">
                    <div class="w-[150px] relative">
                        <input type="text" name="q" placeholder="Search..." class="w-full rounded-full bg-white border border-gray-200 px-4 py-1.5 pl-9 shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-600" />
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/></svg>
                        </span>
                    </div>
                </form>
                <a href="#" class="inline-flex items-center px-6 py-2 rounded-full bg-emerald-600 hover:bg-emerald-700 text-white">Sign Up</a>
            </div>
        </div>
    </div>

    <!-- Navigation (hidden to match screenshot) -->
    <nav class="hidden bg-white dark:bg-dark-surface shadow-sm border-b border-gray-200 dark:border-dark-border" x-data="navigation()">
        <div class="container-responsive">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-primary-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900 dark:text-dark-text">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="text-gray-700 dark:text-dark-muted hover:text-primary-500 dark:hover:text-dark-text transition-colors duration-200">Home</a>
                    <a href="#" class="text-gray-700 dark:text-dark-muted hover:text-primary-500 dark:hover:text-dark-text transition-colors duration-200">Features</a>
                    <a href="#" class="text-gray-700 dark:text-dark-muted hover:text-primary-500 dark:hover:text-dark-text transition-colors duration-200">About</a>
                    <a href="#" class="text-gray-700 dark:text-dark-muted hover:text-primary-500 dark:hover:text-dark-text transition-colors duration-200">Contact</a>
                    
                    <!-- Dark Mode Toggle -->
                    <button @click="toggle()" class="p-2 rounded-lg bg-gray-100 dark:bg-dark-border hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                        <svg x-show="!dark" class="w-5 h-5 text-gray-700 dark:text-dark-text" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                        <svg x-show="dark" class="w-5 h-5 text-gray-700 dark:text-dark-text" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </button>

                    <!-- Auth Links -->
                    @if (Route::has('login'))
                        <div class="flex items-center space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn-secondary">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-gray-700 dark:text-dark-muted hover:text-primary-500 dark:hover:text-dark-text transition-colors duration-200">Logout</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-700 dark:text-dark-muted hover:text-primary-500 dark:hover:text-dark-text transition-colors duration-200">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn-primary">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button @click="toggle()" class="p-2 rounded-lg bg-gray-100 dark:bg-dark-border hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                        <svg x-show="!open" class="w-6 h-6 text-gray-700 dark:text-dark-text" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg x-show="open" class="w-6 h-6 text-gray-700 dark:text-dark-text" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div x-show="open" x-transition class="md:hidden py-4 border-t border-gray-200 dark:border-dark-border">
                <div class="flex flex-col space-y-4">
                    <a href="{{ url('/') }}" class="text-gray-700 dark:text-dark-muted hover:text-primary-500 dark:hover:text-dark-text transition-colors duration-200">Home</a>
                    <a href="#" class="text-gray-700 dark:text-dark-muted hover:text-primary-500 dark:hover:text-dark-text transition-colors duration-200">Features</a>
                    <a href="#" class="text-gray-700 dark:text-dark-muted hover:text-primary-500 dark:hover:text-dark-text transition-colors duration-200">About</a>
                    <a href="#" class="text-gray-700 dark:text-dark-muted hover:text-primary-500 dark:hover:text-dark-text transition-colors duration-200">Contact</a>
                    
                    @if (Route::has('login'))
                        <div class="pt-4 border-t border-gray-200 dark:border-dark-border">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="block mb-2 text-gray-700 dark:text-dark-muted hover:text-primary-500 dark:hover:text-dark-text transition-colors duration-200">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-gray-700 dark:text-dark-muted hover:text-primary-500 dark:hover:text-dark-text transition-colors duration-200">Logout</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="block mb-2 text-gray-700 dark:text-dark-muted hover:text-primary-500 dark:hover:text-dark-text transition-colors duration-200">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn-primary inline-block">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Profile Footer Banner -->
    <section class="bg-white">
        <div class="w-full pt-0 pb-0 text-center">
            <div class="w-full bg-white border-t border-b border-gray-200 shadow-sm p-8 flex flex-col items-center">
                <img src="{{ asset('images/Virasith_Pic.jpg') }}" alt="Profile" class="w-20 h-20 rounded-full object-cover border-4 border-white shadow" />
                <h3 class="mt-3 text-3xl font-bold text-black">Shubham Agrawal</h3>
                <p class="text-base text-gray-600"><span class="text-indigo-600">@shubham</span> | Vadodara, Gujarat</p>
                <div class="mt-4 flex gap-3">
                    <a href="#" class="w-8 h-8 bg-white border border-gray-800 rounded-lg flex items-center justify-center text-gray-900 hover:bg-gray-900 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11zm0 2a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7zM17.5 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 bg-white border border-gray-800 rounded-lg flex items-center justify-center text-gray-900 hover:bg-gray-900 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-4.72 15-3.36-4.62L7.3 18H6l5-6.87L6.48 6H9l3.16 4.35L16.7 6h1.3l-4.66 5.98L18 18h-2.72z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 bg-white border border-gray-800 rounded-lg flex items-center justify-center text-gray-900 hover:bg-gray-900 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M21.8 8.001a3.002 3.002 0 0 0-2.116-2.124C18.2 5.5 12 5.5 12 5.5s-6.2 0-7.684.377A3.002 3.002 0 0 0 2.2 8.001 31.64 31.64 0 0 0 1.8 12c-.004 1.333.096 2.666.4 3.999a3.002 3.002 0 0 0 2.116 2.124C5.8 18.5 12 18.5 12 18.5s6.2 0 7.684-.377A3.002 3.002 0 0 0 21.8 16c.304-1.333.404-2.666.4-3.999.004-1.333-.096-2.666-.4-3.999zM10 15V9l5 3-5 3z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#EEF1D5] border-t border-transparent mt-auto">
        <div class="container-responsive py-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-auto" />
                </div>

                <nav class="flex justify-center">
                    <ul class="flex items-center gap-8 text-gray-700">
                        <li><a href="#about" class="hover:underline">About</a></li>
                        <li><a href="#contact" class="hover:underline">Contact</a></li>
                        <li><a href="#" class="hover:underline">Sign Up</a></li>
                    </ul>
                </nav>

                <div class="flex items-center gap-6 text-gray-700">
                    <a href="#" class="text-sm hover:underline">in</a>
                    <a href="#" class="text-sm hover:underline">tw</a>
                    <a href="#" class="text-sm hover:underline">ig</a>
                </div>
            </div>

            <div class="mt-6 pt-6 border-t border-gray-200">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="flex items-center gap-8 text-sm text-gray-700">
                        <a href="#" class="hover:underline">Privacy Policy</a>
                        <a href="#" class="hover:underline">Terms & Conditions</a>
                    </div>
                    <p class="text-sm text-gray-700">© {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- End Of Page Panel -->
    <section class="bg-[#EEF1D5] border-t border-transparent">
        <div class="container-responsive py-10 text-center">
            <div class="w-full border-t border-gray-300 mb-6"></div>
            <h3 class="text-2xl font-semibold text-gray-900">You've reached the end.</h3>
            <p class="text-gray-600 mt-2">Return to the top & explore more or contact us.</p>
            <button onclick="window.scrollTo({ top: 0, behavior: 'smooth' })" class="mt-5 inline-flex items-center gap-2 px-5 py-2 rounded-full bg-gray-900 text-white hover:bg-gray-800 shadow-md">
                <span>↑</span>
                <span>Back to Top</span>
            </button>
        </div>
    </section>

    <div x-data="{ show: false }" x-init="window.addEventListener('scroll', () => { const nearBottom = (window.innerHeight + window.scrollY) >= (document.body.offsetHeight - 8); show = nearBottom; })" x-show="show" x-transition class="fixed bottom-6 right-6 z-50">
        <button @click="window.scrollTo({ top: 0, behavior: 'smooth' })" class="h-12 w-12 rounded-full bg-gray-900 text-white shadow-lg flex items-center justify-center hover:bg-gray-800">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
            </svg>
        </button>
    </div>

    <!-- Toast Container -->
    <div x-data="toast()" class="fixed top-4 right-4 z-50 space-y-2">
        <template x-for="message in messages" :key="message.id">
            <div x-show="true" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-x-full"
                 x-transition:enter-end="opacity-100 transform translate-x-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform translate-x-0"
                 x-transition:leave-end="opacity-0 transform translate-x-full"
                 :class="{
                     'bg-green-500': message.type === 'success',
                     'bg-orange-500': message.type === 'error',
                     'bg-yellow-500': message.type === 'warning',
                     'bg-blue-500': message.type === 'info'
                 }"
                 class="px-4 py-3 rounded-lg shadow-lg text-white flex items-center justify-between min-w-64">
                <span x-text="message.message"></span>
                <button @click="remove(message.id)" class="ml-4 text-white hover:text-gray-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </template>
    </div>

    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>
