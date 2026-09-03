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
        <p class="text-right text-lg font-bold text-black">{{ $price }} جنيه</p>
    </header>

    {{-- Scrollable body --}}
    <main class="flex-1 overflow-y-auto px-5 pb-4 pt-3">
        {{-- Preview banner --}}
        <div class="relative aspect-[356/164] w-full overflow-hidden rounded-[10px] bg-[#FBF3E3]">
            <img
                src="{{ asset('images/cards/preview.webp') }}"
                alt=""
                draggable="false"
                class="absolute inset-0 size-full object-cover"
                onerror="this.remove()"
            >
        </div>

        {{-- Card message --}}
        <div class="mt-5 rounded-[9px] border border-[#D81D35] bg-[#FFF0EE] p-4 shadow-[0px_4px_8.8px_0px_rgba(0,0,0,0.15)]">
            <h2 class="text-right text-sm font-bold text-[#D81D35]">الكتابة على الكارت</h2>
            <textarea
                wire:model="message"
                rows="4"
                maxlength="250"
                class="mt-2 w-full resize-none bg-transparent text-justify text-[13px] font-bold leading-normal text-black focus:outline-none"
                placeholder="اكتب رسالتك هنا..."
            ></textarea>
        </div>

        {{-- Card designs --}}
        <h2 class="mt-6 text-right text-lg font-bold text-[#D81D35]">اختار شكل الكارت</h2>
        <div class="mt-3 grid grid-cols-2 gap-x-4 gap-y-4">
            @foreach ($cards as $index => $card)
                <button
                    type="button"
                    wire:click="select({{ $index }})"
                    @class([
                        'relative aspect-[168/120] w-full overflow-hidden rounded-[9px] bg-[#D9D9D9] transition',
                        'border-[1.5px] border-[#D81D35]' => $selected === $index,
                    ])
                    aria-label="{{ $card['name'] }}"
                    aria-pressed="{{ $selected === $index ? 'true' : 'false' }}"
                >
                    @if ($card['image'])
                        <img
                            src="{{ $card['image'] }}"
                            alt=""
                            draggable="false"
                            class="absolute inset-0 size-full object-cover"
                        >
                    @endif
                </button>
            @endforeach
        </div>
    </main>

    {{-- Skip / continue CTA --}}
    <div class="shrink-0 px-5 pb-3 pt-2 shadow-[0px_-5px_9.2px_0px_rgba(0,0,0,0.10)]">
        <button
            type="button"
            wire:click="continueToAddresses"
            wire:loading.attr="disabled"
            @class([
                'flex h-[61px] w-full items-center justify-center rounded-[20px] bg-[#D81D35] text-lg font-bold shadow-[0px_4px_7.5px_0px_rgba(0,0,0,0.25)] transition active:scale-[0.99]',
                'text-white' => $selected !== null,
                'text-[#E8D41D]' => $selected === null,
            ])
        >
            {{ $selected !== null ? 'اللي بعده' : 'كمل بدون بطاقة' }}
        </button>
    </div>

    {{-- Bottom navigation --}}
    <x-bottom-nav active="cart" :cart-count="$cartCount" />
</div>
