<div
    class="flex min-h-dvh flex-col bg-white font-sans text-[#060606]"
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
            <div class="relative size-10 shrink-0">
                <div class="absolute inset-0 flex items-center justify-center -rotate-[12.76deg]">
                    <svg class="size-8" viewBox="0 0 27.1643 28.9999" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M19.4402 1.18764C20.1969 0.681269 21.1349 0.800781 21.6044 1.20916C21.8078 1.38644 22.0066 1.68834 21.797 2.12107C21.3569 3.03412 20.4195 3.62375 19.4102 3.62375H16.5204C16.6563 3.97492 16.7316 4.35611 16.7316 4.75486C16.7316 5.11 16.6716 5.45154 16.5629 5.77043H23.3592C23.8123 4.90949 23.8451 3.92111 23.4413 3.01543L22.6132 1.15648C22.5164 0.941249 22.368 0.740742 22.1663 0.565156C21.4628 -0.0454304 20.1035 -0.283321 18.965 0.477929L15.8441 2.5674C16.0423 2.77244 16.2134 3.00353 16.3505 3.25559L19.4402 1.18764Z" fill="#D81D35"/>
                        <path d="M10.6031 5.76986C10.4944 5.45098 10.4344 5.10943 10.4344 4.7543C10.4344 4.35555 10.5097 3.97435 10.6456 3.62318H7.75752C6.74818 3.62318 5.81078 3.03299 5.36842 2.11994C5.15885 1.68777 5.35766 1.38588 5.56156 1.20916C5.81418 0.989394 6.20217 0.853456 6.62471 0.853456C6.98777 0.853456 7.37576 0.95371 7.72523 1.18764L10.8144 3.25559C10.9515 3.00297 11.1231 2.77187 11.3208 2.5674L8.19988 0.477929C7.06141 -0.283321 5.70203 -0.0454304 5.00025 0.565156C4.77539 0.760566 4.61566 0.986562 4.52164 1.23012L3.72471 3.01486C3.32029 3.92055 3.35314 4.90893 3.80684 5.76986H10.6031Z" fill="#D81D35"/>
                        <path d="M11.5247 5.76986H15.6396C15.7914 5.46344 15.8775 5.11849 15.8775 4.7543C15.8775 3.48951 14.8467 2.45865 13.5819 2.45865C12.3171 2.45865 11.2862 3.48951 11.2862 4.7543C11.2868 5.11906 11.3729 5.46344 11.5247 5.76986Z" fill="#D81D35"/>
                        <path d="M0 8.41951V11.2261C0 12.0694 0.584545 12.7786 1.36902 12.9706H11.9999V6.62287H1.79609C0.806009 6.62287 0 7.42887 0 8.41951Z" fill="#D81D35"/>
                        <path d="M1.36957 26.6159C1.36957 27.9305 2.43895 28.9999 3.75358 28.9999H12.0005V13.823H1.36957V26.6159Z" fill="#D81D35"/>
                        <path d="M25.3688 6.62287H15.1661V12.97H25.7953C26.5803 12.778 27.1643 12.0689 27.1643 11.2255V8.41895C27.1649 7.42887 26.3589 6.62287 25.3688 6.62287Z" fill="#D81D35"/>
                        <path d="M15.1661 28.9999H23.4113C24.7259 28.9999 25.7953 27.9305 25.7953 26.6159V13.823H15.1661V28.9999Z" fill="#D81D35"/>
                    </svg>
                </div>
                <div class="absolute -top-1 -left-1 flex size-[21px] items-center justify-center">
                    <svg class="absolute inset-0 size-full" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="10.5" cy="10.5" r="10.5" fill="#E8D41D"/>
                    </svg>
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
            <h2 class="text-lg font-bold text-[#D41D38]">الأقسام</h2>
            <div class="mt-3 grid grid-cols-3 gap-x-3 gap-y-3">
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
