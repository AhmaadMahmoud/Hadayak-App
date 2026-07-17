<button
    type="button"
    class="relative block aspect-[115/85] w-full overflow-hidden rounded-[10px] bg-[#FCE9EB]"
>
    @if ($image)
        <img
            src="{{ asset('images/home/'.$image) }}"
            alt=""
            draggable="false"
            class="absolute inset-0 size-full object-cover"
        >
    @endif
    <span
        class="absolute inset-x-0 bottom-2 z-10 px-1 text-center text-xs font-semibold leading-normal text-[#060606]"
    >
        {{ $label }}
    </span>
</button>
