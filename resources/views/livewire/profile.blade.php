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
        </div>

        <h1 class="mt-3 text-right text-lg font-bold text-[#D41D38]">حسابي</h1>
    </header>

    {{-- Scrollable body --}}
    <main class="flex-1 overflow-y-auto px-5 pb-4 pt-3">
        @if ($user)
            {{-- Account card --}}
            <div class="flex items-center gap-4 rounded-[12px] border-2 border-[#B70011] bg-[#FFF0EE] p-[18px]">
                <span class="flex size-16 shrink-0 items-center justify-center rounded-full bg-white text-2xl font-bold text-[#D81D35]">
                    {{ mb_substr($user['name'] ?? 'ه', 0, 1) }}
                </span>
                <div class="min-w-0">
                    <p class="truncate text-lg font-bold text-[#281715]">{{ $user['name'] }}</p>
                    <p class="text-sm font-medium text-[#5C403C]" dir="ltr" style="text-align: right;">{{ $user['phone'] }}</p>
                </div>
            </div>
        @else
            {{-- Guest card --}}
            <div class="rounded-[12px] border-2 border-dashed border-[#E6BDB8] bg-[#FFF8F7] p-[18px] text-center">
                <p class="text-base font-bold text-[#281715]">أهلًا بيك في هداياك 🎁</p>
                <p class="mt-1 text-sm text-[#5C403C]">سجّل دخولك عشان تتابع طلباتك وعناوينك</p>
                <a
                    href="{{ route('login') }}"
                    wire:navigate
                    class="mt-4 inline-block rounded-[20px] bg-[#D81D35] px-14 py-4 text-base font-bold text-white shadow-[0px_4px_7.5px_0px_rgba(0,0,0,0.25)]"
                >
                    تسجيل الدخول
                </a>
            </div>
        @endif

        {{-- Menu --}}
        <div class="mt-5 space-y-3">
            {{-- طلباتي --}}
            <a href="{{ route('my-orders') }}" wire:navigate class="flex w-full items-center justify-between rounded-[12px] border border-[#F3EFE7] bg-white p-4 drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]">
                <span class="flex items-center gap-3">
                    <span class="flex size-9 items-center justify-center rounded-[8px] bg-[#B70011]/10 text-[#B70011]">
                        <svg class="size-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M20 7H4l2-4h12l2 4ZM4 7v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7"/>
                            <path d="M9 11a3 3 0 0 0 6 0"/>
                        </svg>
                    </span>
                    <span class="text-sm font-bold text-[#281715]">طلباتي</span>
                </span>
                <svg class="size-4 text-[#C1C1C1]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 6l-6 6 6 6"/></svg>
            </a>

            {{-- العناوين --}}
            <a href="{{ route('addresses') }}" wire:navigate class="flex w-full items-center justify-between rounded-[12px] border border-[#F3EFE7] bg-white p-4 drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]">
                <span class="flex items-center gap-3">
                    <span class="flex size-9 items-center justify-center rounded-[8px] bg-[#DCE2F3]/50 text-[#3B5BA9]">
                        <svg class="size-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                    </span>
                    <span class="text-sm font-bold text-[#281715]">العناوين المحفوظة</span>
                </span>
                <svg class="size-4 text-[#C1C1C1]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 6l-6 6 6 6"/></svg>
            </a>

            {{-- تواصل معنا --}}
            <a href="#" class="flex w-full items-center justify-between rounded-[12px] border border-[#F3EFE7] bg-white p-4 drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]">
                <span class="flex items-center gap-3">
                    <span class="flex size-9 items-center justify-center rounded-[8px] bg-[#E8F5E9] text-[#2E7D32]">
                        <svg class="size-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5Z"/>
                        </svg>
                    </span>
                    <span class="text-sm font-bold text-[#281715]">تواصل معنا</span>
                </span>
                <svg class="size-4 text-[#C1C1C1]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 6l-6 6 6 6"/></svg>
            </a>

            {{-- عن هداياك --}}
            <a href="#" class="flex w-full items-center justify-between rounded-[12px] border border-[#F3EFE7] bg-white p-4 drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]">
                <span class="flex items-center gap-3">
                    <span class="flex size-9 items-center justify-center rounded-[8px] bg-[#FFF3E0] text-[#E65100]">
                        <svg class="size-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 8h.01M12 12v4"/>
                        </svg>
                    </span>
                    <span class="text-sm font-bold text-[#281715]">عن هداياك</span>
                </span>
                <svg class="size-4 text-[#C1C1C1]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 6l-6 6 6 6"/></svg>
            </a>

            @if ($user)
                {{-- تسجيل الخروج --}}
                <button
                    type="button"
                    wire:click="logout"
                    wire:loading.attr="disabled"
                    class="flex w-full items-center justify-between rounded-[12px] border border-[#F3EFE7] bg-white p-4 drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]"
                >
                    <span class="flex items-center gap-3">
                        <span class="flex size-9 items-center justify-center rounded-[8px] bg-[#B70011]/10 text-[#D81D35]">
                            <svg class="size-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9"/>
                            </svg>
                        </span>
                        <span class="text-sm font-bold text-[#D81D35]">تسجيل الخروج</span>
                    </span>
                </button>
            @endif
        </div>

        <p class="mt-8 text-center text-xs text-[#C1C1C1]">هداياك — الإصدار 1.0.0</p>
    </main>

    {{-- Bottom navigation --}}
    <x-bottom-nav active="profile" :cart-count="$cartCount" />
</div>
