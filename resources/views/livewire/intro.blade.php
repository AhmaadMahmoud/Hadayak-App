<div class="relative min-h-dvh w-full overflow-hidden bg-[#C20D2C]">
    {{-- Full-bleed background (extends under notches / safe areas) --}}
    <img
        src="{{ asset('images/intro-bg.png') }}"
        alt=""
        aria-hidden="true"
        draggable="false"
        class="pointer-events-none absolute inset-0 h-full w-full select-none object-cover"
    >

    {{-- Centered logo, kept within the device safe area --}}
    <div
        class="relative flex min-h-dvh w-full items-center justify-center"
        style="
            padding-top: env(safe-area-inset-top);
            padding-right: env(safe-area-inset-right);
            padding-bottom: env(safe-area-inset-bottom);
            padding-left: env(safe-area-inset-left);
        "
    >
        <img
            src="{{ asset('images/intro-logo.png') }}"
            alt="هداياك"
            draggable="false"
            class="pointer-events-none h-auto w-[clamp(9rem,48vw,18rem)] select-none"
        >
    </div>
</div>
