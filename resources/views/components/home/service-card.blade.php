<button
    type="button"
    class="relative block aspect-square w-[38vw] max-w-[9.5rem] shrink-0 snap-start overflow-hidden rounded-[10px] bg-[#1a1a1a]"
>
    @if ($image ?? null)
        <img
            src="{{ $image }}"
            alt=""
            draggable="false"
            class="absolute inset-0 size-full object-cover"
        >
    @endif
    <span
        class="absolute inset-x-0 bottom-0 z-10 bg-gradient-to-t from-black/70 to-transparent px-2 pb-3 pt-6 text-center text-xs font-semibold leading-normal text-white"
    >
        {{ $label }}
    </span>
</button>
