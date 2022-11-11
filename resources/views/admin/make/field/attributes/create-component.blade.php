<table class="w-full text-left">
    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
        <td colspan="100" class="p-0">
            <div x-show="expanded" x-collapse>
                <div class="px-4 pb-4 sm:px-5">
                    <h1 class="pt-2">
                        {{ $model->column_name }}
                    </h1>
                    <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                        <table class="is-hoverable w-full text-left">
                            <thead>
                                <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                    <th
                                        class="whitespace-nowrap px-1 py-1 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                        {{ __('Template') }}
                                    </th>
                                    <th
                                        class="whitespace-nowrap px-1 py-1 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                        {{ __('Tamanho') }}
                                    </th>
                                    <th
                                        class="whitespace-nowrap px-1 py-1 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                        {{ __('Visible') }}
                                    </th>
                                    <th
                                        class="whitespace-nowrap px-1 py-1 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                        {{ __('Sortable') }}
                                    </th>
                                    <th
                                        class="whitespace-nowrap px-1 py-1 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                        {{ __('Searchable') }}
                                    </th>
                                    <th
                                        class="whitespace-nowrap px-1 py-1 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                        {{ __('FK') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                    <td class="whitespace-nowrap px-1 py-1 sm:px-5">
                                        @if ($field = form('column_template', $fields))
                                            <x-dynamic-component component="tall-{{ $field->component }}"
                                                :field="$field" />
                                            {{-- <x-tall-input-error :for="$field->key" /> --}}
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-1 py-1 sm:px-5">
                                        @if ($field = form('column_span', $fields))
                                            <x-dynamic-component component="tall-{{ $field->component }}"
                                                :field="$field" />
                                            {{-- <x-tall-input-error :for="$field->key" /> --}}
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-1 py-1 sm:px-5">
                                        @if ($field = form('column_visible', $fields))
                                            <x-dynamic-component component="tall-{{ $field->component }}"
                                                :field="$field" />
                                            {{-- <x-tall-input-error :for="$field->key" /> --}}
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-1 py-1 sm:px-5">
                                        @if ($field = form('column_sortable', $fields))
                                            <x-dynamic-component component="tall-{{ $field->component }}"
                                                :field="$field" />
                                            {{-- <x-tall-input-error :for="$field->key" /> --}}
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-1 py-1 sm:px-5">
                                        @if ($field = form('column_searchable', $fields))
                                            <x-dynamic-component component="tall-{{ $field->component }}"
                                                :field="$field" />
                                            {{-- <x-tall-input-error :for="$field->key" /> --}}
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-1 py-1 sm:px-5">
                                        @if ($field = form('column_fk', $fields))
                                            <x-dynamic-component component="tall-{{ $field->component }}"
                                                :field="$field" />
                                            {{-- <x-tall-input-error :for="$field->key" /> --}}
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-1 py-0 sm:px-5">
                                        <button type="button" wire:click='saveAndStay'
                                            class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                            <x-tall-icon name="pencil" />
                                        </button>
                                        <button type="button" wire:click='delete'
                                            class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                            <x-tall-icon name="trash" />
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <button @click="expanded = false"
                            class="btn mt-2 h-8 rounded px-3 text-xs+ font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                            Hide
                        </button>
                    </div>
                </div>
            </div>
        </td>
    </tr>
</table>
