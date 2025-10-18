@props([
    'type' => 'text',
    'label' => null,
    'error' => null,
    'required' => false,
    'placeholder' => null,
])

<div class="space-y-2">
    @if($label)
        <label class="block text-sm font-medium text-[#212121]">
            {{ $label }}
            @if($required)
                <span class="text-[#78C2AD]">*</span>
            @endif
        </label>
    @endif
    
    <input 
        type="{{ $type }}"
        {{ $attributes->merge(['class' => 'input-field' . ($error ? ' border-[#78C2AD] focus:ring-[#78C2AD]' : '')]) }}
        @required($required)
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
    >
    
    @if($error)
        <p class="text-sm text-[#78C2AD]">{{ $error }}</p>
    @endif
</div>
