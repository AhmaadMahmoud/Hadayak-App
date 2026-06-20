<div class="flex flex-col items-center">
    <div @class([
        'aspect-[115/85] w-full overflow-hidden rounded-[10px]',
        'bg-[#D9D9D9]' => ! $image,
    ])>
        @if ($image)
            <img
                src="{{ asset('images/home/'.$image) }}"
                alt=""
                draggable="false"
                class="size-full object-cover"
            >
        @endif
    </div>
    <p class="mt-2 text-center text-xs font-semibold leading-normal text-[#060606]">
        {{ $label }}
    </p>
</div>
