@props(['name', 'price', 'image' => null])

<div class="w-full">
    {{-- Product image --}}
    <div class="relative aspect-square w-full overflow-hidden rounded-[10px] bg-[#D9D9D9]">
        @if ($image)
            <img
                src="{{ asset('images/products/'.$image) }}"
                alt="{{ $name }}"
                draggable="false"
                class="absolute inset-0 size-full object-cover"
            >
        @endif

        {{-- Add to cart --}}
        <button
            type="button"
            class="absolute bottom-2 right-2 flex size-7 items-center justify-center rounded-full bg-[#D81D35] text-white transition active:scale-95"
            aria-label="أضف {{ $name }} إلى السلة"
        >
            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
                <path d="M12 5v14M5 12h14"/>
            </svg>
        </button>
    </div>

    {{-- Title + price --}}
    <h3 class="mt-2 text-right text-lg font-bold text-[#D41D38]">{{ $name }}</h3>
    <p class="mt-1 text-right text-base font-bold text-black">{{ $price }} جنيه</p>
</div>
