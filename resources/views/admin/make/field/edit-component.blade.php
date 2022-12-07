<table x-data="{ expanded: false }" class="w-full text-left draggable" data-id="{{ $model->id }}">
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
            <td class="px-1 py-0">
                <div class="flex space-x-2 justify-between items-center">
                    @if ($field = form('ordering', $fields))
                        <div class="flex  draggable-handler">
                            <x-tall-icon name="arrows-expand" class="h-5 w-5"/>
                        </div>
                    @endif
                    <x-tall-app-make-modal>
                        @livewire('tall::admin.make.field.fk.create-component', compact('model'), key($model->id))
                    </x-tall-app-make-modal>
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
                        <i :class="expanded && '-rotate-180'"
                            class="fas fa-chevron-down text-sm transition-transform"></i>
                    </button>
                </div>
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
