@props(['model', 'fn'])
<div x-show="showDrawer" x-data="{ showDrawer: @entangle($attributes->wire('model')).defer }" x-on:show-drawer.window="(showDrawer = true)"
    @keydown.window.escape="showDrawer = false">
    <div class="fixed inset-0 z-[100] bg-slate-900/60 transition-opacity duration-200"
        wire:click="toggleDrawer" x-show="showDrawer" x-transition:enter="ease-out"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
    <div class="fixed right-0 top-0 z-[101] h-full w-80">
        <form wire:submit.prevent="{{ $fn }}"
            class="flex h-full w-full transform-gpu flex-col bg-white transition-transform duration-200 dark:bg-navy-700"
            x-show="showDrawer" x-transition:enter="ease-out" x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0" x-transition:leave="ease-in" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full">
            <div class="flex h-14 items-center justify-between bg-slate-150 p-4 dark:bg-navy-800">
                <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                    {{ $model->name }}
                </h3>
                <div class="-mr-1.5 flex items-center space-x-2.5">
                    <div class="flex">
                        <button type="button" wire:click="toggleDrawer"
                            class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="is-scrollbar-hidden flex grow flex-col space-y-4 overflow-y-auto p-4">
                {{ $slot }}
            </div>
            <div class="flex border-t border-slate-150 py-3 px-4 dark:border-navy-600 space-y-3">
                <div class="flex flex-col w-full">
                    @isset($imports)
                        {{ $imports }}
                    @endisset
                    <div class="w-full flex mt-2 items-center justify-between">
                        @isset($actions)
                            {{ $actions }}
                        @endisset
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
