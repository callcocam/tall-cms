<table class="w-full text-left">
    <thead>
        <tr>
            <th
                class="whitespace-nowrap bg-slate-200 px-2 py-1 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100">
                {{ __('Nome') }}
            </th>
            <th
                class="whitespace-nowrap bg-slate-200 px-2 py-1 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100">
                {{ __('Tipo') }}
            </th>
            <th
                class="whitespace-nowrap bg-slate-200 px-2 py-1 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100">
                {{ __('Visivel') }}
            </th>
            <th
                class="whitespace-nowrap bg-slate-200 px-2 py-1 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100">
                {{ __('Largura') }}
            </th>
            {{-- <th
                class="whitespace-nowrap bg-slate-200 px-2 py-1 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100">
                {{ __('Ordem') }}
            </th> --}}
            <th
                class="whitespace-nowrap bg-slate-200 px-2 py-1 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100">
                <x-tall-app-make-modal btnLabel="Adicionar Campos">
                    @livewire('tall::admin.make.field.type.create-component')
                </x-tall-app-make-modal>
            </th>
        </tr>
    </thead>
    <tr>
        <td colspan="100">
            <x-tall-errors :$errors :$fields />
            @if (session()->has('notification'))
                <div class="alert flex space-x-2 rounded-lg border border-error px-4 py-4 text-error">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    @if ($message = session('notification'))
                        <p>{{ data_get($message, 'text') }}</p>
                    @endif
                </div>
            @endif

        </td>
    </tr>
    <tr class="border-y border-transparent">
        <td class="px-1 py-1">
            @if ($field = form('make_fields.column_name', $fields))
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </td>
        <td class="px-1 py-1">
            @if ($field = form('make_fields.make_field_type_id', $fields))
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </td>
        <td class="px-1 py-1">
            @if ($field = form('make_fields.column_visible', $fields))
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </td>
        <td class="px-1 py-1">
            @if ($field = form('make_fields.column_width', $fields))
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </td>
        <td class="px-1 py-1">
            <button wire:click='saveAndStay'
                class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <x-tall-icon name="plus" />
            </button>
        </td>
    </tr>
</table>
