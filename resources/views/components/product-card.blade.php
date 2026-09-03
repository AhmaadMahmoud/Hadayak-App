@props(['id' => null, 'name', 'price', 'image' => null])

<div class="w-full">
    {{-- Product image --}}
    <div class="relative aspect-square w-full overflow-hidden rounded-[10px] bg-[#D9D9D9]">
        @if ($image)
            <img
                src="{{ $image }}"
                alt="{{ $name }}"
                draggable="false"
                class="absolute inset-0 size-full object-cover"
            >
        @endif

        {{-- Open product details --}}
        <a
            href="{{ route('product', ['id' => $id ?? 0]) }}"
            wire:navigate
            class="absolute inset-0"
            aria-label="تفاصيل {{ $name }}"
        ></a>

        {{-- Add to cart --}}
        <button
            type="button"
            @if ($id) wire:click="addToCart({{ $id }})" @endif
            class="absolute bottom-2 right-2 z-10 flex size-7 items-center justify-center rounded-full bg-[#BDBDBD] text-[#757575] transition active:scale-95 active:bg-[#D81D35] active:text-white"
            aria-label="أضف {{ $name }} إلى السلة"
        >
            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
                <path d="M12 5v14M5 12h14"/>
            </svg>
        </button>
    </div>

    {{-- Title + price --}}
    <h3 class="mt-2 text-right text-lg font-bold text-[#D41D38]">
        <a href="{{ route('product', ['id' => $id ?? 0]) }}" wire:navigate>{{ $name }}</a>
    </h3>
    <p class="mt-1 text-right text-base font-bold text-black">{{ $price }} جنيه</p>
</div>
