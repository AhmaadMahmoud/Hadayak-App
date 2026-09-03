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

        <h1 class="mt-3 text-right text-lg font-bold text-[#D41D38]">{{ $heading }}</h1>
    </header>

    {{-- Scrollable body --}}
    <main class="flex-1 overflow-y-auto px-5 pb-4 pt-3">
        @if (session('order_placed'))
            <div class="mb-4 flex items-center gap-3 rounded-[12px] border border-[#2E7D32]/20 bg-[#E8F5E9] p-4">
                <span class="text-2xl">🎉</span>
                <div>
                    <p class="text-sm font-bold text-[#2E7D32]">طلبك وصلنا!</p>
                    <p class="text-xs text-[#2E7D32]/80">رقم الطلب: {{ session('order_placed') }}</p>
                </div>
            </div>
        @endif

        @if ($offline)
            <div class="flex h-40 items-center justify-center rounded-[16px] bg-[#FFF0EE] opacity-70">
                <p class="text-center text-sm font-medium text-[#5C403C]">مش قادرين نوصل للسيرفر دلوقتي، جرب تاني</p>
            </div>
        @elseif (empty($orders))
            {{-- Empty state --}}
            <div class="flex flex-col items-center justify-center pt-16 text-center">
                <span class="flex size-20 items-center justify-center rounded-full bg-[#FFF0EE] text-[#D81D35]">
                    <svg class="size-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="8" width="18" height="4" rx="1"/>
                        <path d="M12 8v13M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7M7.5 8a2.5 2.5 0 0 1 0-5C11 3 12 8 12 8s1-5 4.5-5a2.5 2.5 0 0 1 0 5"/>
                    </svg>
                </span>
                <p class="mt-4 text-base font-bold text-[#281715]">لسه معملتش أي طلب</p>
                <p class="mt-1 text-sm text-[#5C403C]">أول هدية تطلبها هتلاقيها هنا</p>
                <a
                    href="{{ route('home') }}"
                    wire:navigate
                    class="mt-6 rounded-[20px] bg-[#D81D35] px-10 py-3 text-base font-bold text-white shadow-[0px_4px_7.5px_0px_rgba(0,0,0,0.25)]"
                >
                    ابدأ التسوق
                </a>
            </div>
        @else
            <div class="space-y-3">
                @foreach ($orders as $order)
                    <div class="rounded-[12px] border border-[#F3EFE7] bg-white p-4 drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-bold text-[#281715]">{{ $order['number'] }}</span>
                            <span
                                @class([
                                    'rounded-full px-3 py-1 text-xs font-bold',
                                    'bg-[#FFF0EE] text-[#B70011]' => in_array($order['status'], ['pending', 'confirmed']),
                                    'bg-[#FFF8E1] text-[#B26A00]' => in_array($order['status'], ['preparing', 'delivering']),
                                    'bg-[#E8F5E9] text-[#2E7D32]' => $order['status'] === 'delivered',
                                    'bg-[#F5F5F5] text-[#757575]' => $order['status'] === 'cancelled',
                                ])
                            >
                                {{ $order['status_label'] }}
                            </span>
                        </div>
                        <div class="mt-3 flex items-center justify-between text-sm text-[#5C403C]">
                            <span>{{ $order['items_count'] }} منتج · {{ $order['date'] }}</span>
                            <span class="font-bold text-[#B70011]">{{ number_format($order['total']) }} ج.م</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>

    {{-- Bottom navigation --}}
    <x-bottom-nav active="profile" :cart-count="$cartCount" />
</div>
