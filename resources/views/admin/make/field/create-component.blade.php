<tbody>
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
        <td class="whitespace-nowrap px-4 py-1 sm:px-5">
            @if ($field = form('make_fields.column_name', $fields))
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </td>
        <td class="whitespace-nowrap px-4 py-1 sm:px-5">
            @if ($field = form('make_fields.make_field_type_id', $fields))
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </td>
        <td class="whitespace-nowrap px-4 py-1 sm:px-5">
            @if ($field = form('make_fields.column_visible', $fields))
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </td>
        <td class="whitespace-nowrap px-4 py-1 sm:px-5">
            @if ($field = form('make_fields.column_width', $fields))
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </td>
        <td class="whitespace-nowrap px-1 py-0 sm:px-5 draggable-handler text-center">
            @if ($field = form('ordering', $fields))
                <x-tall-icon name="arrows-expand" />
            @endif
        </td>
        <td class="whitespace-nowrap px-4 py-1 sm:px-5">

            @if ($make_field_attributes)
                <button @click="expanded = !expanded"
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <i :class="expanded && '-rotate-180'" class="fas fa-chevron-down text-sm transition-transform"></i>
                </button>
            @else
                <button wire:click='saveAndStay'
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <x-tall-icon name="plus" />
                </button>
            @endif
        </td>
    </tr>
</tbody>
