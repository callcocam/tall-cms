@props(['tableAttr' => [], 'filters' => null, 'status' => null, 'config' => null])
<div x-data="{ isFilterExpanded: @entangle($attributes->wire('model')).defer }">
    <div class="flex items-center justify-between">
        <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
            {{ data_get($tableAttr, 'active', 'Lista dados da tabela') }}
        </h2>
        <div class="flex items-center">
            <x-tall-input.search wire:model.debounce.500ms="filters.search" placeholder="{{ __('Search here') }}..."
                type="text" />
            <x-tall-button.flat wire:click="$toggle('isFilterExpanded')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewbox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18 11.5H6M21 4H3m6 15h6" />
                </svg>
            </x-tall-button.flat>
            @isset($actions)
                {{ $actions }}
            @endisset
            @if ($filters)
                <x-tall-button.flat wire:click="clearFilters">
                    <x-tall-icon name="arrow-path" class="h-4.5 w-4.5" />
                </x-tall-button.flat>
            @endif
            @if ($routeCreate = data_get($tableAttr, 'crud.create'))
                <a href="{{ $routeCreate }}"
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <x-tall-icon name="plus" class="h-4.5 w-4.5" />
                </a>
            @endif
            <x-tall-button.flat title="Importar dados de um CSV"
                @click="$dispatch('show-drawer', { drawerId: 'edit-todo-drawer' })">
                <x-tall-icon name="excel-96" class="h-4.5 w-4.5" />
            </x-tall-button.flat>
        </div>
    </div>
    <div x-show="isFilterExpanded" x-collapse>
        <div class="max-w-full px-3">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:gap-6">
                @isset($extraFilters)
                    <div class="col-span-1 sm:col-span-2">
                        {{ $extraFilters }}
                    </div>
                @endisset
                <div class="col-span-1  sm:col-span-2">
                    <x-tall-app-table-filter-date />
                </div>
                @if ($status)
                    <x-tall-app-table-filter-status :$status />
                @endif
            </div>
            @if ($filters)
                <div class="mt-1 space-x-1 text-right">
                    <button wire:click="clearFilters"
                        class="btn font-medium text-slate-700 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25">
                        {{ __('Clear filters') }}
                    </button>
                </div>
            @endif
        </div>
    </div>
    {{ $slot }}
</div>
