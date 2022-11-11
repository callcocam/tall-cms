<tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
    <td class="">
        @if ($field = form('make_model_id', $fields))
            <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
            {{-- <x-tall-input-error :for="$field->key" /> --}}
        @endif
    </td>
    <td class="">
        @if ($field = form('make_field_foreign_key_id', $fields))
            <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
            {{-- <x-tall-input-error :for="$field->key" /> --}}
        @endif
    </td>
    <td class="">
        @if ($field = form('make_field_local_key_id', $fields))
            <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
            {{-- <x-tall-input-error :for="$field->key" /> --}}
        @endif
    </td>
    <td class="">
        @if ($field = form('foreign_type', $fields))
            <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
            {{-- <x-tall-input-error :for="$field->key" /> --}}
        @endif
    </td>
    <td class="flex sm:px-5">
        <button type="button" wire:click='saveAndStay'
            class="btn h-8 w-8 mt-5 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
            <x-tall-icon name="pencil" />
        </button>
        <x-tall-button-confirm type="button" wire:click='delete'>
            Tem certeza que deseja excluir esse registro?
        </x-tall-button-confirm>
    </td>
</tr>
