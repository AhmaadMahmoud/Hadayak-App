<div class="relative min-h-dvh w-full overflow-hidden bg-[#C20D2C]">
    {{-- Background photo --}}
    <img
        src="{{ asset('images/login-bg.jpg') }}"
        alt=""
        aria-hidden="true"
        draggable="false"
        class="pointer-events-none absolute inset-0 size-full select-none object-cover"
    >

    {{-- Red gradient tint over the photo (matches "هدايا باك" overlay at 85%) --}}
    <img
        src="{{ asset('images/intro-bg.png') }}"
        alt=""
        aria-hidden="true"
        draggable="false"
        class="pointer-events-none absolute inset-0 size-full select-none object-cover opacity-85"
    >

    {{-- Foreground content, kept within the device safe area --}}
    <div
        class="relative flex min-h-dvh w-full flex-col items-center justify-center"
        style="
            padding-top: env(safe-area-inset-top);
            padding-right: env(safe-area-inset-right);
            padding-bottom: env(safe-area-inset-bottom);
            padding-left: env(safe-area-inset-left);
        "
    >
        <form wire:submit="submit" class="flex w-4/5 max-w-sm flex-col font-cairo">
            {{-- Info line --}}
            <p class="px-2 text-lg font-bold text-white">
                verification&nbsp; Code sent as SMS
            </p>

            {{-- Code input --}}
            <input
                type="text"
                wire:model="code"
                placeholder="Code"
                inputmode="numeric"
                autocomplete="one-time-code"
                class="mt-4 w-full rounded-full bg-white px-6 py-3.5 text-xl text-zinc-700 placeholder:text-[#C1C1C1] focus:outline-none"
            >

            @if ($error || $errors->any())
                <p class="mt-3 px-2 text-center text-sm font-bold text-[#F1BE18]" dir="rtl">
                    {{ $error ?? $errors->first() }}
                </p>
            @endif

            @if ($notice)
                <p class="mt-3 px-2 text-center text-sm font-bold text-white" dir="rtl">{{ $notice }}</p>
            @endif

            <button
                type="submit"
                wire:loading.attr="disabled"
                class="mt-4 block w-full rounded-full bg-[#F1BE18] px-6 py-3.5 text-center text-xl font-bold text-[#D31D38] disabled:opacity-60"
            >
                <span wire:loading.remove>تأكيد</span>
                <span wire:loading>...</span>
            </button>

            <button
                type="button"
                wire:click="resend"
                class="mt-4 text-center text-sm font-bold text-white/90"
            >
                موصلكش كود؟ ابعت تاني
            </button>
        </form>
    </div>
</div>
