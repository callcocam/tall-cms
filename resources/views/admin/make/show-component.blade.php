<x-tall-app-show :showAttr="$showAttr">
    <x-slot name='filters'>
        <x-slot name="actions">

        </x-slot>
        <div class="p-5">
            <span>{{ __('Selecione as opções desejadas') }}:</span>
            <div class="mt-2 grid grid-cols-1 gap-4 sm:grid-cols-4 sm:gap-5 lg:gap-6">
                <label class="inline-flex items-center space-x-2">
                    <input value="1" wire:model.lazy='form_data.genarate_timestamps'
                        class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:border-secondary checked:bg-secondary hover:border-secondary focus:border-secondary dark:border-navy-400 dark:checked:border-secondary-light dark:checked:bg-secondary-light dark:hover:border-secondary-light dark:focus:border-secondary-light"
                        type="checkbox" />
                    <span>{{ __('Adiconar TIMESPANS') }}</span>
                </label>
                <label class="inline-flex items-center space-x-2">
                    <input value="1" wire:model.lazy='form_data.genarate_status'
                        class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                        type="checkbox" />
                    <span>{{ __('Adiconar STATUS') }}</span>
                </label>
                <label class="inline-flex items-center space-x-2">
                    <input value="1" wire:model.lazy='form_data.genarate_content'
                        class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:!border-success checked:bg-success hover:!border-success focus:!border-success dark:border-navy-400"
                        type="checkbox" />
                    <span>{{ __('Gerar um EDITOR') }}</span>
                </label>
                <label class="inline-flex items-center space-x-2">
                    <input value="1" wire:model.lazy='form_data.genarate_author'
                        class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:!border-success checked:bg-success hover:!border-success focus:!border-success dark:border-navy-400"
                        type="checkbox" />
                    <span>{{ __('Gerar uma seleção de AUTHOR') }}</span>
                </label>
            </div>
        </div>
    </x-slot>
    <table class="w-full text-left">
       
        <tbody>
            <tr>
                <td colspan="5">
                    @livewire('tall::admin.make.field.create-component', compact('model'), key('create-make-field'))
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <x-tall-sortable>
                        @if ($make_fields = $model->make_fields)
                            @foreach ($make_fields as $make_field)
                                @livewire('tall::admin.make.field.edit-component', compact('make_field'), key($make_field->id))
                            @endforeach
                        @endif
                    </x-tall-sortable>
                </td>
            </tr>
        </tbody>
    </table>
</x-tall-app-show>
