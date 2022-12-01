@props(['showAttr' => []])
<div class="main-content w-full px-[var(--margin-x)] pb-8" x-init="() => {
    $wire.on('notification', (e) => $notification(e))

}">
    <div class="flex items-center space-x-4 py-5 lg:py-6">
        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            {{ data_get($showAttr, 'title', 'Form Advanced') }}
        </h2>
        <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
        </div>
        <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
                <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                    href="{{ data_get($showAttr, 'crud.list', 'admin') }}">
                    {{ data_get($showAttr, 'description', 'Current') }}
                </a>
                <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </li>
            @if ($route = data_get($showAttr, 'crud.edit'))
                <li class="flex items-center space-x-2">
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="{{ $route }}">
                        {{ __('Editar') }}
                    </a>
                    <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </li>
            @endif
            <li>{{ data_get($showAttr, 'active', 'Active') }}</li>
        </ul>
    </div>
    {{ $slot }}
</div>
