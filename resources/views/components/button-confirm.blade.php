@props(['title' => 'Modal Title'])
<div x-data="{ showModal: @entangle('showModal').defer }">
    <button x-on:click="$wire.showModal = true"
        class="btn h-8 w-8 mt-5 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
        <x-tall-icon name="trash" />
    </button>
    <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
        x-show="showModal" role="dialog" @keydown.window.escape="$wire.showModal = false">
        <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" x-on:click="$wire.showModal = false"
            x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"></div>
        <div class="relative max-w-md rounded-lg bg-white pt-4 pb-4 text-center transition-all duration-300 dark:bg-navy-700"
            x-show="showModal" x-transition:enter="easy-out"
            x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]" x-transition:leave="easy-in"
            x-transition:leave-start="opacity-100 [transform:translate3d(0,0,0)]"
            x-transition:leave-end="opacity-0 [transform:translate3d(0,1rem,0)]">
            <div class="mt-0 px-4 sm:px-8">
                <div class="text-lg text-slate-800 dark:text-navy-50 flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-16 h-16">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                    </svg>
                </div>
                <p class="mt-1 px-2 text-slate-500 dark:text-navy-200">
                    {{ $slot }}
                </p>
            </div>
            <div class="my-4 mt-8 h-px bg-slate-200 dark:bg-navy-500"></div>

            <div class="space-x-3">
                <button x-on:click="$wire.showModal = false"
                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                    {{ __('Cancel') }}
                </button>
                <button
                    {{ $attributes->class('btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90') }}>
                    {{ __('Confirmar') }}
                </button>
            </div>
        </div>
    </div>
</div>
