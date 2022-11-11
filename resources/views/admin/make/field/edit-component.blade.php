<table x-data="{ expanded: false }" class="w-full text-left draggable" data-id="{{ $model->id }}">
    {{-- @if (!$model->ordering)
        <thead>
            <tr class="border-y border-transparent">
                <th
                    class="bg-slate-200 px-1 py-1 px-1 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 ">
                    {{ __('Nome') }}
                </th>
                <th
                    class="bg-slate-200 px-1 py-1 px-1 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 ">
                    {{ __('Tipo') }}
                </th>
                <th
                    class="bg-slate-200 px-1 py-1 px-1 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 ">
                    {{ __('Visivel') }}
                </th>
                <th
                    class="bg-slate-200 px-1 py-1 px-1 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 ">
                    {{ __('Largura') }}
                </th>
                <th
                    class="bg-slate-200 px-1 py-1 px-1 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 ">
                    {{ __('Ordem') }}
                </th>
                <th
                    class="bg-slate-200 px-1 py-1 px-1 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 ">
                    {{ __('Ação') }}
                </th>
            </tr>
        </thead>
    @endif --}}
    <tbody>
        <tr class="border-y border-transparent">
            <td class="px-1 py-1">
                @if ($field = form('column_name', $fields))
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                    {{-- <x-tall-input-error :for="$field->key" /> --}}
                @endif
            </td>
            <td class="px-1 py-1">
                @if ($field = form('make_field_type_id', $fields))
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                    {{-- <x-tall-input-error :for="$field->key" /> --}}
                @endif
            </td>
            <td class="px-1 py-1">
                @if ($field = form('column_visible', $fields))
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                    {{-- <x-tall-input-error :for="$field->key" /> --}}
                @endif
            </td>
            <td class="px-1 py-1">
                @if ($field = form('column_width', $fields))
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                    {{-- <x-tall-input-error :for="$field->key" /> --}}
                @endif
            </td>
            <td class="px-1 py-0 draggable-handler text-center">
                @if ($field = form('ordering', $fields))
                    <x-tall-icon name="arrows-expand" />
                @endif
            </td>
            <td class="px-1 py-0">
                <button type="button" wire:click='saveAndStay'
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <x-tall-icon name="pencil" />
                </button>
                <button type="button" wire:click='delete'
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <x-tall-icon name="trash" />
                </button>
                <button type="button" @click="expanded = !expanded"
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <i :class="expanded && '-rotate-180'" class="fas fa-chevron-down text-sm transition-transform"></i>
                </button>
            </td>
        </tr>
    </tbody>
    <tfoot x-show="expanded">
        <tr>
            <td colspan="100">
                @livewire('tall::admin.make.field.attributes.create-component', compact('model'), key(sprintf('create-make-field-attributes-%s', $model->id)))
            </td>
        </tr>
    </tfoot>
</table>
