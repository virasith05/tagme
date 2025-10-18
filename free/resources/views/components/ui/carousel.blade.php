@props([
    'images' => [],
    'height' => 'h-[360px] md:h-[420px]',
])

<div x-data="carousel()" x-init="slides = @js($images); init()" class="relative w-full overflow-hidden rounded-none md:rounded-lg">
    <!-- Slides container -->
    <div class="relative w-full {{ $height }}">
        <template x-for="(img, index) in slides" :key="index">
            <div
                class="absolute inset-0 transition-transform duration-500"
                :style="slideStyle(index)"
            >
                <img :src="img" alt="slide" class="w-full h-full object-contain bg-white" />
            </div>
        </template>
    </div>

    <!-- Prev/Next -->
    <button @click="previous()" class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white rounded-full p-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button @click="next()" class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white rounded-full p-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </button>

    <!-- Dots -->
    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2">
        <template x-for="(img, index) in slides" :key="'dot-'+index">
            <button @click="goToSlide(index)" class="w-2.5 h-2.5 rounded-full"
                :class="currentSlide === index ? 'bg-white' : 'bg-white/60 hover:bg-white'"
                aria-label="Go to slide"></button>
        </template>
    </div>
</div>

