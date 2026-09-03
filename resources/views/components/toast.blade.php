{{-- إشعار عائم بستايل هداياك — بيتنده من Livewire بـ $this->dispatch('toast', ...) --}}
<div
    x-data="{
        show: false,
        title: '',
        detail: '',
        timer: null,
        fire(payload = {}) {
            this.title = payload.title || 'اتضاف للبوكس';
            this.detail = payload.detail || '';
            this.show = true;
            clearTimeout(this.timer);
            this.timer = setTimeout(() => (this.show = false), 2800);
        },
    }"
    @toast.window="fire($event.detail)"
    class="pointer-events-none fixed inset-x-0 z-50 flex justify-center px-5"
    style="top: max(0.75rem, env(safe-area-inset-top));"
    dir="rtl"
>
    <div
        x-show="show"
        x-cloak
        x-transition:enter="transition duration-300 ease-out"
        x-transition:enter-start="-translate-y-3 scale-95 opacity-0"
        x-transition:enter-end="translate-y-0 scale-100 opacity-100"
        x-transition:leave="transition duration-200 ease-in"
        x-transition:leave-start="translate-y-0 scale-100 opacity-100"
        x-transition:leave-end="-translate-y-3 scale-95 opacity-0"
        @click="show = false"
        role="status"
        aria-live="polite"
        class="pointer-events-auto flex w-full max-w-sm items-center gap-3 rounded-[20px] bg-[#D81D35] px-4 py-3 text-white shadow-[0px_4px_7.5px_0px_rgba(0,0,0,0.25)]"
    >
        {{-- علامة صح --}}
        <span class="flex size-9 shrink-0 items-center justify-center rounded-full bg-white text-[#D81D35]">
            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="m5 13 4.5 4.5L19 7"/>
            </svg>
        </span>

        {{-- النص --}}
        <div class="min-w-0 flex-1 text-right">
            <p class="truncate text-sm font-bold leading-tight" x-text="title"></p>
            <p class="mt-0.5 truncate text-xs leading-tight text-white/80" x-text="detail" x-show="detail"></p>
        </div>

        {{-- رابط البوكس --}}
        <a
            href="{{ route('gift-box') }}"
            wire:navigate
            @click.stop
            class="shrink-0 rounded-full bg-white/20 px-3 py-1.5 text-xs font-bold text-white transition active:scale-95"
        >
            شوف البوكس
        </a>
    </div>
</div>
