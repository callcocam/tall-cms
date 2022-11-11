<tbody>
    <tr>
        <td colspan="100">
            <x-tall-errors :$errors :$fields />
        </td>
    </tr>
    <tr class="border-y border-transparent">
        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
            @if ($field = form('field.status', $fields))
                <x-tall-icon name="arrows-expand" />>
            @endif
        </td>
        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
            @if ($field = form('field.column_name', $fields))
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </td>
        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
            @if ($field = form('field.column_type', $fields))
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </td>
        <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
            @if ($field = form('field.column_nullable', $fields))
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </td>
        <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
            @if ($field = form('field.column_primary', $fields))
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </td>
        <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
            @if ($field = form('field.column_index', $fields))
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </td>
        <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
            @if ($field = form('field.column_unique', $fields))
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </td>
        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
            @if ($field = form('field.column_default', $fields))
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </td>
        <td class="whitespace-nowrap px-4 py-3 sm:px-5">

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
