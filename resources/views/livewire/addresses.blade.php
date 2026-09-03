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
        @if (empty($addresses))
            <div class="flex flex-col items-center justify-center pt-10 text-center">
                <span class="flex size-20 items-center justify-center rounded-full bg-[#FFF0EE] text-[#D81D35]">
                    <svg class="size-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                </span>
                <p class="mt-4 text-base font-bold text-[#281715]">لسه مضفتش أي عنوان</p>
                <p class="mt-1 text-sm text-[#5C403C]">ضيف عنوانك عشان نعرف نوصلك هديتك</p>
            </div>
        @endif

        <div class="space-y-4 @if(empty($addresses)) mt-4 @endif">
            {{-- Address cards --}}
            @foreach ($addresses as $address)
                <button
                    type="button"
                    wire:click="select({{ $address['id'] }})"
                    @class([
                        'block w-full rounded-[12px] p-[18px] text-right transition',
                        'border-2 border-[#B70011] bg-[#FFF0EE] shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)]' => $selectedId === $address['id'],
                        'border border-[#F3EFE7] bg-white drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]' => $selectedId !== $address['id'],
                    ])
                    aria-pressed="{{ $selectedId === $address['id'] ? 'true' : 'false' }}"
                >
                    <div class="flex items-start justify-between">
                        {{-- Label + icon (right in RTL) --}}
                        <div class="flex items-center gap-3">
                            @if (($address['label'] ?? 'home') === 'home')
                                <span class="flex size-9 items-center justify-center rounded-[8px] bg-[#B70011]/10 text-[#B70011]">
                                    <svg class="size-[18px]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M19.4606 8.69904L11.3008 0.539551C10.9531 0.19165 10.4907 0 9.99892 0C9.50713 0 9.04479 0.191498 8.69689 0.539398L0.542745 8.69339C-0.179606 9.42001 -0.178385 10.5853 0.538015 11.3017C0.865316 11.6292 1.2976 11.8188 1.75979 11.8387C1.77855 11.8405 1.79748 11.8414 1.81655 11.8414H2.14171V17.8453C2.14171 19.0334 3.10836 20 4.29671 20H7.48854C7.81203 20 8.07448 19.7377 8.07448 19.4141V14.707C8.07448 14.1649 8.51546 13.7239 9.05761 13.7239H10.9402C11.4824 13.7239 11.9234 14.1649 11.9234 14.707V19.4141C11.9234 19.7377 12.1857 20 12.5093 20H15.7011C16.8895 20 17.8561 19.0334 17.8561 17.8453V11.8414H18.1576C18.6493 11.8414 19.1116 11.6499 19.4597 11.302C20.1768 10.5844 20.1771 9.41711 19.4606 8.69904Z"/>
                                    </svg>
                                </span>
                            @else
                                <span class="flex size-9 items-center justify-center rounded-[8px] bg-[#DCE2F3]/50 text-[#3B5BA9]">
                                    <svg class="size-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <rect x="2" y="7" width="20" height="14" rx="2"/>
                                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                                    </svg>
                                </span>
                            @endif

                            <span class="flex flex-col">
                                <span class="text-sm font-bold text-[#281715]">{{ ['home' => 'المنزل', 'office' => 'المكتب'][$address['label']] ?? 'عنوان' }}</span>
                                <span class="text-xs font-medium text-[#5C403C]">{{ $address['area'] ?? '' }}</span>
                            </span>
                        </div>

                        {{-- Radio (left in RTL) --}}
                        <span
                            @class([
                                'mt-0.5 flex size-5 items-center justify-center rounded-full border-2',
                                'border-[#B70011]' => $selectedId === $address['id'],
                                'border-[#F3EFE7]' => $selectedId !== $address['id'],
                            ])
                        >
                            @if ($selectedId === $address['id'])
                                <span class="size-2.5 rounded-full bg-[#B70011]"></span>
                            @endif
                        </span>
                    </div>

                    <div class="mt-4 space-y-1">
                        <p class="text-sm text-[#5C403C]">{{ collect([$address['street'] ?? null, $address['building'] ?? null ? 'مبنى '.$address['building'] : null, $address['floor'] ?? null ? 'الدور '.$address['floor'] : null])->filter()->implode('، ') }}</p>
                        <p class="text-sm text-[#5C403C]" dir="ltr" style="text-align: right;">{{ $address['phone'] ?? '' }}</p>
                    </div>
                </button>
            @endforeach

            {{-- Add new address --}}
            <a
                href="{{ route('add-address') }}"
                wire:navigate
                class="flex w-full items-center justify-center gap-2 rounded-[12px] border-2 border-dashed border-[#E6BDB8] bg-[#FFF8F7] p-[18px] text-sm font-bold text-[#5C403C]"
            >
                <span>إضافة عنوان جديد</span>
                <svg class="size-[19px] text-[#B70011]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                    <path d="M12 7v6M9 10h6"/>
                </svg>
            </a>

            {{-- Atmosphere note --}}
            <div class="flex h-[128px] items-center justify-center rounded-[16px] bg-[#FFF0EE] opacity-50">
                <p class="text-center text-xs font-medium text-[#5C403C]">نحن نهتم بوصول هداياك بكل حب وسرعة</p>
            </div>
        </div>
    </main>

    {{-- Continue CTA --}}
    <div class="shrink-0 px-5 pb-3 pt-2 shadow-[0px_-5px_9.2px_0px_rgba(0,0,0,0.10)]">
        <button
            type="button"
            wire:click="continueToPayment"
            wire:loading.attr="disabled"
            class="flex h-[61px] w-full items-center justify-center rounded-[20px] bg-[#D81D35] text-lg font-bold text-white shadow-[0px_4px_7.5px_0px_rgba(0,0,0,0.25)] transition active:scale-[0.99]"
        >
            {{ empty($addresses) ? 'اضف العنوان' : 'اللي بعده' }}
        </button>
    </div>

    {{-- Bottom navigation --}}
    <x-bottom-nav active="cart" :cart-count="$cartCount" />
</div>
