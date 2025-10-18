@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'disabled' => false,
    'loading' => false,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';
    
    $variants = [
        'primary' => 'bg-[#78C2AD] hover:bg-[#6BB39A] text-white shadow-lg hover:shadow-xl focus:ring-[#78C2AD]',
        'secondary' => 'bg-white hover:bg-gray-50 text-[#212121] border border-[#212121] focus:ring-[#212121]',
        'outline' => 'border border-[#78C2AD] text-[#78C2AD] hover:bg-[#78C2AD] hover:text-white focus:ring-[#78C2AD]',
        'ghost' => 'text-[#212121] hover:bg-gray-100 focus:ring-gray-500',
        'danger' => 'bg-red-500 hover:bg-red-600 text-white shadow-lg hover:shadow-red-500/30 focus:ring-red-500',
    ];
    
    $sizes = [
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-6 py-3 text-base',
        'lg' => 'px-8 py-4 text-lg',
        'xl' => 'px-10 py-5 text-xl',
    ];
    
    $classes = $baseClasses . ' ' . $variants[$variant] . ' ' . $sizes[$size];
@endphp

<button 
    type="{{ $type }}"
    {{ $attributes->merge(['class' => $classes]) }}
    @disabled($disabled || $loading)
>
    @if($loading)
        <svg class="animate-spin -ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    @endif
    
    {{ $slot }}
</button>
