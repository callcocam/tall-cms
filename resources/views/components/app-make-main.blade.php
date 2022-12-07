@props(['tableAttr' => []])
<main class="main-content w-full px-[var(--margin-x)] pb-8" x-init="() => {
    $wire.on('notification', (e) => $notification(e))

}">
    <div class="flex items-center space-x-4 py-5 lg:py-6">
        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            {{ data_get($tableAttr, 'title', 'Lists') }}
        </h2>
        <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
        </div>
        <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
                @if (\Route::has(data_get($tableAttr, 'routeEdit')))
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="{{ route(data_get($tableAttr, 'routeEdit', 'admin')) }}">
                        {{ data_get($tableAttr, 'description', 'Current') }}
                    </a>
                @elseif(\Route::has(data_get($tableAttr, 'routeList')))
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="{{ route(data_get($tableAttr, 'routeList', 'admin')) }}">
                        {{ data_get($tableAttr, 'description', 'Current') }}
                    </a>
                @else
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="{{ route('admin') }}">
                        {{ data_get($tableAttr, 'description', 'Current') }}
                    </a>
                @endif
                <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </li>
            <li>{{ data_get($tableAttr, 'active', 'Active') }}</li>
        </ul>
    </div>
    {{ $slot }}
</main>
