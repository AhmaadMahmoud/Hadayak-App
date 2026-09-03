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
        <div class="flex w-4/5 max-w-sm flex-col items-center">
            {{-- Logo --}}
            <img
                src="{{ asset('images/intro-logo.png') }}"
                alt="هداياك"
                draggable="false"
                class="pointer-events-none h-auto w-[clamp(4.5rem,23vw,7rem)] select-none"
            >

            {{-- Screen title --}}
            <h1 class="mt-6 font-cairo text-xl font-bold text-white">Sign up</h1>

            {{-- Credentials + primary action --}}
            <form wire:submit="submit" class="mt-6 flex w-full flex-col gap-3 font-cairo">
                <input
                    type="text"
                    wire:model="name"
                    placeholder="Name"
                    autocomplete="name"
                    class="w-full rounded-full bg-white px-6 py-3.5 text-xl text-zinc-700 placeholder:text-[#C1C1C1] focus:outline-none"
                >
                <input
                    type="tel"
                    wire:model="phone"
                    placeholder="phone number"
                    autocomplete="tel"
                    class="w-full rounded-full bg-white px-6 py-3.5 text-xl text-zinc-700 placeholder:text-[#C1C1C1] focus:outline-none"
                >
                <input
                    type="password"
                    wire:model="password"
                    placeholder="password"
                    autocomplete="new-password"
                    class="w-full rounded-full bg-white px-6 py-3.5 text-xl text-zinc-700 placeholder:text-[#C1C1C1] focus:outline-none"
                >

                @if ($error || $errors->any())
                    <p class="px-2 text-center text-sm font-bold text-[#F1BE18]" dir="rtl">
                        {{ $error ?? $errors->first() }}
                    </p>
                @endif

                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    class="block w-full rounded-full bg-[#F1BE18] px-6 py-3.5 text-center text-xl font-bold text-[#D31D38] disabled:opacity-60"
                >
                    <span wire:loading.remove>Signup</span>
                    <span wire:loading>...</span>
                </button>
            </form>

            {{-- Social action --}}
            <a
                href="#"
                class="mt-8 flex w-full items-center justify-center gap-3 rounded-full bg-[#D9D9D9] px-6 py-3.5 font-cairo"
            >
                <img
                    src="{{ asset('images/google-icon.png') }}"
                    alt=""
                    draggable="false"
                    class="size-8 shrink-0 select-none"
                >
                <span class="text-lg font-bold text-[#518EF8]">Signup</span>
            </a>
        </div>
    </div>
</div>
