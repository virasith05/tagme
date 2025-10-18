@props([
    'id' => null,
    'title' => null,
    'size' => 'md',
    'closable' => true,
])

@php
    $sizes = [
        'sm' => 'max-w-md',
        'md' => 'max-w-lg',
        'lg' => 'max-w-2xl',
        'xl' => 'max-w-4xl',
        'full' => 'max-w-full mx-4',
    ];
@endphp

<div 
    x-data="modal()"
    @if($id) x-init="if($wire && $wire.get('{{ $id }}')) open()" @endif
    @if($id) @{{ $id }}.window="open()" @endif
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 overflow-y-auto"
    style="display: none;"
>
    <!-- Background overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-50" @if($closable) @click="close()" @endif></div>
    
    <!-- Modal container -->
    <div class="flex min-h-full items-center justify-center p-4">
        <div 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="relative w-full {{ $sizes[$size] }} transform overflow-hidden rounded-xl bg-white dark:bg-dark-surface shadow-xl"
        >
            <!-- Header -->
            @if($title || $closable)
                <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-dark-border">
                    @if($title)
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-dark-text">
                            {{ $title }}
                        </h3>
                    @endif
                    
                    @if($closable)
                        <button 
                            @click="close()"
                            class="text-gray-400 hover:text-gray-600 dark:hover:text-dark-text transition-colors duration-200"
                        >
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    @endif
                </div>
            @endif
            
            <!-- Content -->
            <div class="p-6">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
