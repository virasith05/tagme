@extends('layouts.app')

@section('title', 'Login')

@section('nofooter')@endsection

@section('main_class', 'min-h-0')

@section('content')
<div class="fixed top-14 bottom-40 left-0 right-0 bg-gray-50">
    <div class="grid grid-cols-1 md:grid-cols-2 h-full">
        <!-- Left: Google card -->
        <div class="flex items-center justify-center p-6">
            <div class="bg-white rounded-2xl shadow-soft border border-gray-100 w-full max-w-sm p-8">
                <div class="flex justify-center">
                    <img src="{{ asset('images/logo.png') }}" alt="TAGME" class="h-10"/>
                </div>
                <p class="mt-5 text-center text-gray-600">Welcome back. Sign in with Google to continue.</p>
                <a href="#" class="mt-6 w-full inline-flex items-center justify-center gap-3 border border-gray-300 rounded-lg px-4 py-3 text-gray-700 hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-5 h-5"><path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
                    s5.373-12,12-12c3.059,0,5.842,1.153,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24
                    s8.955,20,20,20s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,16.108,18.961,13,24,13c3.059,0,5.842,1.153,7.961,3.039l5.657-5.657
                    C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.193l-6.191-5.238C29.211,35.091,26.715,36,24,36
                    c-5.202,0-9.619-3.317-11.283-7.946l-6.54,5.036C9.505,39.556,16.227,44,24,44z"/><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.091,5.569c0.001-0.001,0.002-0.001,0.003-0.002
                    l6.191,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/></svg>
                    <span class="font-medium">Login with Google</span>
                </a>
            </div>
        </div>
        
        <!-- Right: image placeholder -->
        <div class="bg-gray-200 hidden md:block">
            <!-- Placeholder for image: keep empty for now -->
        </div>
    </div>
</div>

<!-- Minimal Footer only for Login page -->
<footer class="bg-[#EEF1D5] border-t border-transparent fixed bottom-0 left-0 right-0 z-50 shadow-sm h-40">
    <div class="container-responsive h-full py-4">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
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

        <div class="mt-4 pt-4 border-t border-gray-200">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                <div class="flex items-center gap-8 text-sm text-gray-700">
                    <a href="#" class="hover:underline">Privacy Policy</a>
                    <a href="#" class="hover:underline">Terms & Conditions</a>
                </div>
                <p class="text-sm text-gray-700">© {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
@endsection
