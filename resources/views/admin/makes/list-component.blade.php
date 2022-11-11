<x-tall-app-table :tableAttr="$tableAttr">
    <x-slot name="actions">
        <ul>
            @if ($route = data_get($tableAttr, 'crud.create'))
                <li>
                    <a href="{{ $route }}"
                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                        {{ __('Cadastrar Novo') }}
                    </a>
                </li>
            @endif

            <li>
                <a href="#"
                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another
                    Action</a>
            </li>
            <li>
                <a href="#"
                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something
                    else</a>
            </li>
        </ul>
    </x-slot>
    <x-slot name="header">
        <th
            class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
            {{ __('Name') }}
        </th>
        <th
            class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
            {{ __('Status') }}
        </th>
        <th
            class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
            @if ($route = data_get($tableAttr, 'crud.create'))
                <a href="{{ $route }}"
                    class="flex items-center px-3  font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                    {{ __('Cadastrar Novo') }}
                </a>
            @endif
        </th>
    </x-slot>
    @if ($models)
        @foreach ($models as $model)
            @if ($posts = data_get($model, 'posts'))
                <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                    @if ($columns)
                        @foreach ($columns as $column)
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ data_get($posts, $column->name) }}</td>
                        @endforeach
                    @endif
                    <td class="px-4 py-3 sm:px-5 flex space-x-3">
                        @if (\Route::has(sprintf('%s.edit', $config->route)))
                            <a href="{{ route(sprintf('%s.edit', $config->route),array_merge([
                                'model'=>$model
                            ], $params)) }}">
                                <x-tall-icon name="pencil" />
                            </a>
                        @endif
                        <a href="{{ route('admin.make.show', $model) }}">
                            <x-tall-icon name="eye" />
                        </a>
                    </td>
                </tr>
            @endif
        @endforeach
        <x-slot name="pagination">
            {{ $models->links() }}
        </x-slot>
    @endif
</x-tall-app-table>
