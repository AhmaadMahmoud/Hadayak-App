<div
    class="flex h-dvh flex-col bg-white font-sans text-[#060606]"
    style="height: 100dvh; overflow: hidden;"
    dir="rtl"
>
    @push('head')
        <meta name="theme-color" content="#FFFFFF">
    @endpush

    {{-- Top bar --}}
    <header
        class="shrink-0 px-5 pt-3"
        style="padding-top: max(0.75rem, env(safe-area-inset-top));"
    >
        <div class="flex items-center justify-between">
            {{-- Back (top-right in RTL) --}}
            <button
                type="button"
                onclick="history.back()"
                class="flex size-7 items-center justify-center rounded-full bg-[#D9D9D9]"
                aria-label="رجوع"
            >
                <svg class="size-[15px] text-[#A8A3A3]" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M14.7602 6.9172L9.34319 1.50001C9.18855 1.34538 8.98248 1.2605 8.76266 1.2605C8.5427 1.2605 8.33678 1.3455 8.18214 1.50001L7.69029 1.99196C7.53577 2.14634 7.45069 2.35256 7.45069 2.57244C7.45069 2.79219 7.53577 3.00536 7.69029 3.15975L10.8505 6.32694H0.810359C0.357684 6.32694 0 6.68132 0 7.13407V7.82963C0 8.28238 0.357684 8.67252 0.810359 8.67252H10.8864L7.69039 11.8574C7.5359 12.012 7.45082 12.2126 7.45082 12.4325C7.45082 12.6521 7.5359 12.8556 7.69039 13.0102L8.18227 13.5005C8.33691 13.6552 8.54294 13.7394 8.76289 13.7394C8.98262 13.7394 9.18869 13.6541 9.34333 13.4994L14.7604 8.08239C14.9154 7.9273 15.0006 7.72022 15 7.50007C15.0005 7.27922 14.9154 7.07196 14.7602 6.9172Z" fill="currentColor"/>
                </svg>
            </button>

            {{-- Messages (top-left in RTL) --}}
            <a href="#" class="flex items-center justify-center text-[#D81D35]" aria-label="الرسائل">
                <svg class="size-[25px]" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M14.8438 4.6875H5.46875C5.0375 4.6875 4.6875 5.0375 4.6875 5.46875C4.6875 5.9 5.0375 6.25 5.46875 6.25H14.8438C15.275 6.25 15.625 5.9 15.625 5.46875C15.625 5.0375 15.275 4.6875 14.8438 4.6875Z" fill="currentColor"/>
                    <path d="M11.7188 7.8125H5.46875C5.0375 7.8125 4.6875 8.1625 4.6875 8.59375C4.6875 9.025 5.0375 9.375 5.46875 9.375H11.7188C12.15 9.375 12.5 9.025 12.5 8.59375C12.5 8.1625 12.15 7.8125 11.7188 7.8125Z" fill="currentColor"/>
                    <path d="M17.1875 0H3.125C1.40156 0 0 1.40156 0 3.125V18.75C0 19.0531 0.175 19.3297 0.45 19.4578C0.554688 19.5063 0.66875 19.5312 0.78125 19.5312C0.960938 19.5312 1.13906 19.4688 1.28125 19.35L5.75156 15.625H17.1875C18.9109 15.625 20.3125 14.2234 20.3125 12.5V3.125C20.3125 1.40156 18.9109 0 17.1875 0ZM18.75 12.5C18.75 13.3609 18.05 14.0625 17.1875 14.0625H5.46875C5.28594 14.0625 5.10938 14.1266 4.96875 14.2438L1.5625 17.0828V3.125C1.5625 2.26406 2.2625 1.5625 3.125 1.5625H17.1875C18.05 1.5625 18.75 2.26406 18.75 3.125V12.5Z" fill="currentColor"/>
                    <path d="M21.875 6.25C21.4438 6.25 21.0938 6.6 21.0938 7.03125C21.0938 7.4625 21.4438 7.8125 21.875 7.8125C22.7375 7.8125 23.4375 8.51406 23.4375 9.375V22.5922L20.8 20.4828C20.6625 20.3734 20.4891 20.3125 20.3125 20.3125H9.375C8.5125 20.3125 7.8125 19.6109 7.8125 18.75V17.9688C7.8125 17.5375 7.4625 17.1875 7.03125 17.1875C6.6 17.1875 6.25 17.5375 6.25 17.9688V18.75C6.25 20.4734 7.65156 21.875 9.375 21.875H20.0375L23.7297 24.8297C23.8719 24.9422 24.0453 25 24.2188 25C24.3328 25 24.4484 24.975 24.5578 24.9234C24.8281 24.7922 25 24.5187 25 24.2188V9.375C25 7.65156 23.5984 6.25 21.875 6.25Z" fill="currentColor"/>
                </svg>
            </a>
        </div>

        <h1 class="mt-3 text-right text-lg font-bold text-[#D41D38]">{{ $heading }}</h1>
    </header>

    {{-- Scrollable body --}}
    <main class="flex-1 overflow-y-auto px-5 pb-4 pt-3">
        {{-- Delivery type --}}
        <section>
            <h2 class="text-right text-sm font-bold text-[#5C403C]">نوع التوصيل</h2>
            <div class="mt-3 flex gap-3">
                {{-- Deliver to me --}}
                <button
                    type="button"
                    wire:click="setType('me')"
                    @class([
                        'flex flex-1 flex-col items-center justify-center rounded-[12px] p-4 transition',
                        'border border-[#B70011] bg-[#FFF0EE]' => $deliveryType === 'me',
                        'border border-[#F3EFE7] bg-white' => $deliveryType !== 'me',
                    ])
                    aria-pressed="{{ $deliveryType === 'me' ? 'true' : 'false' }}"
                >
                    <svg class="h-7 w-4 text-[#B70011]" viewBox="0 0 24 36" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 12c0 6-8 14-8 14s-8-8-8-14a8 8 0 0 1 16 0Z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                    <span class="mt-1 text-sm text-[#281715]">التوصيل لي</span>
                    <span
                        @class([
                            'mt-2 size-4 rounded-full',
                            'border-[5px] border-[#B70011]' => $deliveryType === 'me',
                            'border-2 border-[#E6BDB8]' => $deliveryType !== 'me',
                        ])
                    ></span>
                </button>

                {{-- Deliver as gift --}}
                <button
                    type="button"
                    wire:click="setType('gift')"
                    @class([
                        'flex flex-1 flex-col items-center justify-center rounded-[12px] p-4 transition',
                        'border border-[#B70011] bg-[#FFF0EE]' => $deliveryType === 'gift',
                        'border border-[#F3EFE7] bg-white' => $deliveryType !== 'gift',
                    ])
                    aria-pressed="{{ $deliveryType === 'gift' ? 'true' : 'false' }}"
                >
                    <svg class="size-6 text-[#B70011]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="8" width="18" height="4" rx="1"/>
                        <path d="M12 8v13M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7M7.5 8a2.5 2.5 0 0 1 0-5C11 3 12 8 12 8s1-5 4.5-5a2.5 2.5 0 0 1 0 5"/>
                    </svg>
                    <span class="mt-1 text-sm text-[#281715]">التوصيل كهدية</span>
                    <span
                        @class([
                            'mt-2 size-4 rounded-full',
                            'border-[5px] border-[#B70011]' => $deliveryType === 'gift',
                            'border-2 border-[#E6BDB8]' => $deliveryType !== 'gift',
                        ])
                    ></span>
                </button>
            </div>
        </section>

        {{-- Map --}}
        <section class="mt-5 overflow-hidden rounded-[12px] border border-[#F3EFE7] bg-white shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)]">
            <div class="flex items-center justify-between border-b border-[#F3EFE7] px-4 py-4">
                <h2 class="text-sm font-bold text-[#5C403C]">تحديد الموقع بدقة</h2>
                <button type="button" class="flex items-center gap-1 text-xs font-medium text-[#B70011]">
                    <span>موقعي الحالي</span>
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="7"/>
                        <circle cx="12" cy="12" r="2.5" fill="currentColor" stroke="none"/>
                        <path d="M12 2v3M12 19v3M2 12h3M19 12h3"/>
                    </svg>
                </button>
            </div>
            <div class="relative h-[192px] w-full bg-[#EDEBE3]">
                <img
                    src="{{ asset('images/map-preview.png') }}"
                    alt=""
                    draggable="false"
                    class="absolute inset-0 size-full object-cover"
                    onerror="this.remove()"
                >
                <span class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-full text-[#D81D35]">
                    <svg class="size-8 drop-shadow" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M12 2a8 8 0 0 0-8 8c0 6 8 12 8 12s8-6 8-12a8 8 0 0 0-8-8Zm0 10.5A2.5 2.5 0 1 1 12 7a2.5 2.5 0 0 1 0 5.5Z"/>
                    </svg>
                </span>
            </div>
        </section>

        {{-- Recipient details --}}
        <section class="mt-5 rounded-[12px] border border-[#F3EFE7] bg-white p-5 drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]">
            <h2 class="text-right text-sm font-bold text-[#5C403C]">تفاصيل المستلم</h2>

            <div class="mt-4 space-y-4">
                <div>
                    <label for="recipient-name" class="block pr-1 text-right text-xs font-medium text-[#585F6C]">الاسم الكامل</label>
                    <div class="relative mt-2">
                        <input
                            id="recipient-name"
                            type="text"
                            wire:model="recipientName"
                            placeholder="أدخل اسم المستلم"
                            autocomplete="name"
                            class="h-12 w-full rounded-[8px] border border-[#F3EFE7] bg-[#FCFAF8] px-4 pl-10 text-right text-sm text-[#281715] placeholder:text-[#6B7280] focus:outline-none focus:ring-1 focus:ring-[#B70011]"
                        >
                        <svg class="pointer-events-none absolute left-4 top-1/2 size-[14px] -translate-y-1/2 text-[#6B7280]" viewBox="0 0 20 23" fill="currentColor" aria-hidden="true">
                            <path d="M10 0C6.80145 0 4.19922 2.60223 4.19922 5.80078C4.19922 8.99933 6.80145 11.6016 10 11.6016C13.1986 11.6016 15.8008 8.99933 15.8008 5.80078C15.8008 2.60223 13.1986 0 10 0Z"/>
                            <path d="M16.8853 15.5006C15.2971 13.888 13.1918 13 10.957 13H8.37891C6.14419 13 4.0388 13.888 2.45068 15.5006C0.870332 17.1052 0 19.2233 0 21.4648C0 21.8208 0.288578 22.1094 0.644531 22.1094H18.6914C19.0474 22.1094 19.3359 21.8208 19.3359 21.4648C19.3359 19.2233 18.4656 17.1052 16.8853 15.5006Z"/>
                        </svg>
                    </div>
                </div>

                <div>
                    <label for="recipient-phone" class="block pr-1 text-right text-xs font-medium text-[#585F6C]">رقم الجوال</label>
                    <div class="relative mt-2">
                        <input
                            id="recipient-phone"
                            type="tel"
                            wire:model="recipientPhone"
                            placeholder="+20 1X XXX XXXX"
                            autocomplete="tel"
                            dir="ltr"
                            class="h-12 w-full rounded-[8px] border border-[#F3EFE7] bg-[#FCFAF8] px-4 pl-10 text-right text-sm text-[#281715] placeholder:text-[#6B7280] focus:outline-none focus:ring-1 focus:ring-[#B70011]"
                        >
                        <svg class="pointer-events-none absolute left-4 top-1/2 size-[16px] -translate-y-1/2 text-[#6B7280]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                            <rect x="7" y="2" width="10" height="20" rx="2"/>
                            <path d="M11 18h2"/>
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        {{-- Delivery address --}}
        <section class="mt-5 rounded-[12px] border border-[#F3EFE7] bg-white p-5 drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]">
            <h2 class="text-right text-sm font-bold text-[#5C403C]">عنوان التوصيل</h2>

            <div class="mt-4 space-y-4">
                <input
                    type="text"
                    wire:model="street"
                    placeholder="الشارع"
                    class="h-12 w-full rounded-[8px] border border-[#F3EFE7] bg-[#FCFAF8] px-4 text-right text-sm text-[#281715] placeholder:text-[#6B7280] focus:outline-none focus:ring-1 focus:ring-[#B70011]"
                >

                <div class="flex gap-2">
                    <input
                        type="text"
                        wire:model="building"
                        placeholder="رقم المبنى"
                        class="h-12 min-w-0 flex-[2] rounded-[8px] border border-[#F3EFE7] bg-[#FCFAF8] px-4 text-right text-sm text-[#281715] placeholder:text-[#6B7280] focus:outline-none focus:ring-1 focus:ring-[#B70011]"
                    >
                    <input
                        type="text"
                        wire:model="floor"
                        placeholder="الدور"
                        class="h-12 min-w-0 flex-1 rounded-[8px] border border-[#F3EFE7] bg-[#FCFAF8] px-4 text-right text-sm text-[#281715] placeholder:text-[#6B7280] focus:outline-none focus:ring-1 focus:ring-[#B70011]"
                    >
                    <input
                        type="text"
                        wire:model="apartment"
                        placeholder="الشقة"
                        class="h-12 min-w-0 flex-1 rounded-[8px] border border-[#F3EFE7] bg-[#FCFAF8] px-4 text-right text-sm text-[#281715] placeholder:text-[#6B7280] focus:outline-none focus:ring-1 focus:ring-[#B70011]"
                    >
                </div>

                <textarea
                    wire:model="landmark"
                    rows="3"
                    placeholder="علامة مميزة"
                    class="w-full resize-none rounded-[8px] border border-[#F3EFE7] bg-[#FCFAF8] px-4 py-3 text-right text-sm text-[#281715] placeholder:text-[#6B7280] focus:outline-none focus:ring-1 focus:ring-[#B70011]"
                ></textarea>
            </div>
        </section>
    </main>

    {{-- Continue CTA --}}
    <div class="shrink-0 px-5 pb-3 pt-2 shadow-[0px_-5px_9.2px_0px_rgba(0,0,0,0.10)]">
        @if ($error || $errors->any())
            <p class="mb-2 text-center text-sm font-bold text-[#D81D35]">
                {{ $error ?? $errors->first() }}
            </p>
        @endif

        <button
            type="button"
            wire:click="submit"
            wire:loading.attr="disabled"
            class="flex h-[61px] w-full items-center justify-center rounded-[20px] bg-[#D81D35] text-lg font-bold text-white shadow-[0px_4px_7.5px_0px_rgba(0,0,0,0.25)] transition active:scale-[0.99] disabled:opacity-60"
        >
            <span wire:loading.remove>تفاصيل الدفع</span>
            <span wire:loading>...</span>
        </button>
    </div>

    {{-- Bottom navigation --}}
    <x-bottom-nav active="cart" :cart-count="$cartCount" />
</div>
