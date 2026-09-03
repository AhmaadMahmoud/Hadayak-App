<div
    class="flex h-dvh flex-col bg-white font-sans text-[#060606]"
    style="height: 100dvh; overflow: hidden;"
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
        {{-- Delivery location + messages --}}
        <div class="flex items-center justify-between">
            <p class="text-sm font-bold text-[#D81D35]">
                {{ $location }}
            </p>

            <a href="#" class="flex shrink-0 items-center justify-center text-[#D81D35]" aria-label="الرسائل">
                <svg class="size-[25px]" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M14.8438 4.6875H5.46875C5.0375 4.6875 4.6875 5.0375 4.6875 5.46875C4.6875 5.9 5.0375 6.25 5.46875 6.25H14.8438C15.275 6.25 15.625 5.9 15.625 5.46875C15.625 5.0375 15.275 4.6875 14.8438 4.6875Z" fill="currentColor"/>
                    <path d="M11.7188 7.8125H5.46875C5.0375 7.8125 4.6875 8.1625 4.6875 8.59375C4.6875 9.025 5.0375 9.375 5.46875 9.375H11.7188C12.15 9.375 12.5 9.025 12.5 8.59375C12.5 8.1625 12.15 7.8125 11.7188 7.8125Z" fill="currentColor"/>
                    <path d="M17.1875 0H3.125C1.40156 0 0 1.40156 0 3.125V18.75C0 19.0531 0.175 19.3297 0.45 19.4578C0.554688 19.5063 0.66875 19.5312 0.78125 19.5312C0.960938 19.5312 1.13906 19.4688 1.28125 19.35L5.75156 15.625H17.1875C18.9109 15.625 20.3125 14.2234 20.3125 12.5V3.125C20.3125 1.40156 18.9109 0 17.1875 0ZM18.75 12.5C18.75 13.3609 18.05 14.0625 17.1875 14.0625H5.46875C5.28594 14.0625 5.10938 14.1266 4.96875 14.2438L1.5625 17.0828V3.125C1.5625 2.26406 2.2625 1.5625 3.125 1.5625H17.1875C18.05 1.5625 18.75 2.26406 18.75 3.125V12.5Z" fill="currentColor"/>
                    <path d="M21.875 6.25C21.4438 6.25 21.0938 6.6 21.0938 7.03125C21.0938 7.4625 21.4438 7.8125 21.875 7.8125C22.7375 7.8125 23.4375 8.51406 23.4375 9.375V22.5922L20.8 20.4828C20.6625 20.3734 20.4891 20.3125 20.3125 20.3125H9.375C8.5125 20.3125 7.8125 19.6109 7.8125 18.75V17.9688C7.8125 17.5375 7.4625 17.1875 7.03125 17.1875C6.6 17.1875 6.25 17.5375 6.25 17.9688V18.75C6.25 20.4734 7.65156 21.875 9.375 21.875H20.0375L23.7297 24.8297C23.8719 24.9422 24.0453 25 24.2188 25C24.3328 25 24.4484 24.975 24.5578 24.9234C24.8281 24.7922 25 24.5187 25 24.2188V9.375C25 7.65156 23.5984 6.25 21.875 6.25Z" fill="currentColor"/>
                </svg>
            </a>
        </div>

        {{-- Search bar --}}
        <div class="mt-3 flex h-11 w-full items-center gap-2 rounded-[20px] bg-[#D9D9D9] px-4">
            <input
                type="search"
                enterkeyhint="search"
                placeholder="بتدور على ايه؟"
                class="min-w-0 flex-1 bg-transparent text-right text-sm font-bold text-[#060606] placeholder:text-[#AEAEAE] focus:outline-none [&::-webkit-search-cancel-button]:appearance-none"
                aria-label="بحث"
            >
            <svg class="size-[22px] shrink-0" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M8.85433 17.7013C10.8207 17.7013 12.7309 17.0453 14.2822 15.837L20.1349 21.6897C20.5721 22.1119 21.2688 22.0998 21.6911 21.6626C22.103 21.2361 22.103 20.56 21.6911 20.1335L15.8384 14.2808C18.8367 10.4211 18.1385 4.86165 14.2788 1.86332C10.4192 -1.13501 4.85971 -0.436805 1.86138 3.42286C-1.13695 7.28252 -0.438743 12.842 3.42092 15.8403C4.97478 17.0475 6.88664 17.7023 8.85433 17.7013ZM4.15173 4.15029C6.74893 1.55304 10.9598 1.55299 13.5571 4.15019C16.1543 6.74739 16.1544 10.9583 13.5572 13.5555C10.96 16.1528 6.74907 16.1528 4.15183 13.5556C1.55454 10.9772 1.53923 6.78171 4.11751 4.18451C4.1289 4.17307 4.14029 4.16168 4.15173 4.15029Z" fill="#AEAEAE"/>
            </svg>
        </div>
    </header>

    {{-- Scrollable body --}}
    <main class="flex-1 overflow-y-auto px-6 pb-4">
        {{-- Hero banner (Figma crop: 145.85% height, -13.91% top) --}}
        <div class="relative mt-4 aspect-[354/175] w-full overflow-hidden rounded-[10px]">
            <img
                src="{{ asset('images/home/hero-banner.jpg') }}"
                alt=""
                draggable="false"
                class="absolute left-0 top-[-13.91%] h-[145.85%] w-full max-w-none object-cover"
            >
        </div>

        {{-- Categories --}}
        <section class="mt-6">
            <h2 class="text-right text-lg font-bold text-[#D41D38]">الأقسام</h2>
            <div class="mt-3 grid grid-cols-3 gap-3">
                @foreach ($categories as $category)
                    <x-home.category-card
                        :label="$category['label']"
                        :image="$category['image']"
                        :href="route('products', array_filter(['category_id' => $category['id'] ?? null, 'name' => $category['label']]))"
                    />
                @endforeach
            </div>
        </section>

        {{-- Special services --}}
        <section class="mt-8">
            <h2 class="text-right text-lg font-bold text-[#D41D38]">خدمات خاصة</h2>
            <div class="-mx-6 mt-3 flex snap-x snap-mandatory gap-4 overflow-x-auto px-6 pb-2 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                @foreach ($services as $service)
                    <x-home.service-card
                        :label="$service['label']"
                        :image="$service['image']"
                    />
                @endforeach
            </div>
        </section>
    </main>

    {{-- Bottom navigation --}}
    <x-bottom-nav active="home" :cart-count="$cartCount" />
</div>
