@props([
    'title' => null,
    'subtitle' => null,
    'header' => null,
    'footer' => null,
    'padding' => true,
])

<div {{ $attributes->merge(['class' => 'card']) }}>
    @if($header || $title || $subtitle)
        <div class="mb-6">
            @if($header)
                {{ $header }}
            @else
                @if($title)
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-dark-text">{{ $title }}</h3>
                @endif
                @if($subtitle)
                    <p class="mt-1 text-sm text-gray-600 dark:text-dark-muted">{{ $subtitle }}</p>
                @endif
            @endif
        </div>
    @endif
    
    <div class="{{ $padding ? 'py-0' : 'py-0' }}">
        {{ $slot }}
    </div>
    
    @if($footer)
        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-dark-border">
            {{ $footer }}
        </div>
    @endif
</div>
