<x-tall-app-make-main :$tableAttr>
    <x-tall-app-make-filter :$filters :$tableAttr :status="$statusOptions" wire:model="isFilterExpanded">
        @if ($selected)
            <x-slot name="actions">
                <x-tall-dropdown label="Bulk Actions">
                    <x-tall-dropdown.item type="button" wire:click="exportSelected" class="flex items-center space-x-2">
                        <x-tall-icon.download class="text-cool-gray-400" /> <span>{{ __('Export') }}</span>
                    </x-tall-dropdown.item>
                    <x-tall-table.delete-confirm wire:click="deleteSelected">
                        <x-tall-icon.trash class="text-cool-gray-400" /> <span>{{ __('Delete') }}</span>
                    </x-tall-table.delete-confirm>
                </x-tall-dropdown>
            </x-slot>
        @endif

        <x-tall-app-make-table>
            <x-slot name="head">
                <x-tall-table.heading class="pr-0 w-8">
                    <x-tall-input.checkbox wire:model="selectPage" />
                </x-tall-table.heading>
                @foreach ($columns as $column)
                    <x-tall-table.heading :sortable="$column->sortable" :name="$column->name">
                        {{ __($column->label) }}
                    </x-tall-table.heading>
                @endforeach
            </x-slot>
            @if ($selectPage)
                <x-tall-table.sample-row class="bg-cool-gray-200" wire:key="row-message">
                    <x-tall-table.cell colspan="100">
                        @unless($selectAll)
                            <div>
                                <span>{{ __('You have selected') }} <strong>{{ $models->count() }}</strong>
                                    {{ __('transactions, do you want to select all') }}
                                    <strong>{{ $models->total() }}</strong>?</span>
                                <x-tall-button.link wire:click="selectAll" class="ml-1 text-blue-600">
                                    {{ __('Select All') }}
                                </x-tall-button.link>
                            </div>
                        @else
                            <span>{{ __('You are currently selecting all') }} <strong>{{ $models->total() }}</strong>
                                {{ __('transactions') }}.</span>
                @endif
                </x-tall-table.cell>
                </x-tall-table.sample-row>
                @endif
                @forelse ($models as $model)
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
                                    <a
                                        href="{{ route(
                                            sprintf('%s.edit', $config->route),
                                            array_merge(
                                                [
                                                    'model' => $model,
                                                ],
                                                $params,
                                            ),
                                        ) }}">
                                        <x-tall-icon name="pencil" />
                                    </a>
                                @endif
                                <a href="{{ route('admin.make.show', $model) }}">
                                    <x-tall-icon name="eye" />
                                </a>
                            </td>
                        </tr>
                    @endif
                @empty
                    <x-tall-table.sample-row wire:key="row-empty">
                        <x-tall-table.cell colspan="100">
                            <div class="flex flex-col justify-content-center">
                                <div class="flex justify-center items-center space-x-2">
                                    <x-tall-icon.inbox class="h-8 w-8 text-cool-gray-400" />
                                    <span
                                        class="font-medium py-8 text-cool-gray-400 text-xl">{{ __('No transactions found') }}...</span>
                                </div>
                                @if ($routeCreate = data_get($tableAttr, 'crud.create'))
                                    <x-tall-app-link href="{{ $routeCreate }}">
                                        <div class="flex space-x-1 w-full justify-center">
                                            <x-tall-icon name="plus" class="h-4.5 w-4.5" />
                                            {{ __('Create your first record') }}
                                        </div>
                                    </x-tall-app-link>
                                @endif
                            </div>
                        </x-tall-table.cell>
                    </x-tall-table.sample-row>
                @endforelse
                <x-slot name="pagination">
                    {{ $models->links() }}
                </x-slot>
            </x-tall-app-make-table>
        </x-tall-app-make-filter>
        @if ($import = $this->import)
            @livewire($import, ['model' => $config])

        @endif
    </x-tall-app-make-main>
