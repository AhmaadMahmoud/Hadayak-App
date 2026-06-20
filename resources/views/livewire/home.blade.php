<div
    class="flex min-h-dvh flex-col bg-white font-cairo text-[#060606]"
    dir="rtl"
>
    @push('head')
        <meta name="theme-color" content="#FFFFFF">
    @endpush

    {{-- Top bar + search (respects safe area) --}}
    <header
        class="shrink-0 px-6 pt-3"
        style="padding-top: max(0.75rem, env(safe-area-inset-top));"
    >
        <div class="flex items-start justify-between">
            {{-- Cart (Figma: top-right) --}}
            <div class="relative size-9 shrink-0">
                <div class="absolute inset-0 flex items-center justify-center -rotate-[12.76deg]">
                    <img
                        src="{{ asset('images/home/cart-icon.png') }}"
                        alt=""
                        draggable="false"
                        class="size-7 object-contain"
                    >
                </div>
                <div class="absolute -top-0.5 -left-1 flex size-5 items-center justify-center">
                    <img
                        src="{{ asset('images/home/cart-badge.png') }}"
                        alt=""
                        aria-hidden="true"
                        draggable="false"
                        class="absolute inset-0 size-full"
                    >
                    <span class="relative text-sm font-bold leading-none text-[#D81D35]">2</span>
                </div>
            </div>

            {{-- Location (Figma: top-left) --}}
            <p class="pt-1 text-xs font-bold text-[#D41D38]">
                شارع كذا على الخريطة
            </p>
        </div>

        {{-- Search bar --}}
        <div
            class="mt-3 h-11 w-full rounded-[17px] bg-[#D9D9D9]"
            aria-hidden="true"
        ></div>
    </header>

    {{-- Scrollable body --}}
    <main class="flex-1 overflow-y-auto px-6 pb-4">
        {{-- Hero banner --}}
        <div class="mt-4 overflow-hidden rounded-[10px]">
            <img
                src="{{ asset('images/home/hero-banner.jpg') }}"
                alt=""
                draggable="false"
                class="aspect-[354/175] w-full object-cover object-[center_-14%]"
            >
        </div>

        {{-- Categories --}}
        <section class="mt-6">
            <h2 class="text-lg font-bold text-[#D41D38]">الأقسام</h2>
            <div class="mt-3 grid grid-cols-3 gap-x-3 gap-y-5">
                @foreach ($categories as $category)
                    <x-home.category-card
                        :label="$category['label']"
                        :image="$category['image']"
                    />
                @endforeach
            </div>
        </section>

        {{-- Special services --}}
        <section class="mt-8">
            <h2 class="text-lg font-bold text-[#D41D38]">خدمات خاصة</h2>
            <div class="-mx-6 mt-3 flex snap-x snap-mandatory gap-4 overflow-x-auto px-6 pb-2 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                @foreach ($services as $service)
                    <x-home.service-card :label="$service['label']" />
                @endforeach
            </div>
        </section>
    </main>

    {{-- Bottom navigation placeholder --}}
    <footer
        class="shrink-0 bg-[#D9D9D9]"
        style="padding-bottom: env(safe-area-inset-bottom);"
    >
        <div class="h-14" aria-hidden="true"></div>
    </footer>
</div>
