<div class="px-4 py-4 sm:px-5">
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        Assumenda incidunt
    </p>
    <form wire:submit.prevent='saveAndStay' class="mt-4 space-y-4">
        <div class="grid grid-cols-12 gap-4">
            @if ($field = form('make_field_fks.make_model_id', $fields))
                <x-tall-label :$field>
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                </x-tall-label>
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
            @if ($field = form('make_field_fks.make_field_foreign_key_id', $fields))
                <x-tall-label :$field>
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                </x-tall-label>
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
            @if ($field = form('make_field_fks.make_field_local_key_id', $fields))
                <x-tall-label :$field>
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                </x-tall-label>
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
            @if ($field = form('make_field_fks.foreign_type', $fields))
                <x-tall-label :$field>
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                </x-tall-label>
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </div>
        <div class="space-x-2 text-right">
            <button @click="showModal = false"
                class="btn min-w-[7rem]  rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                {{ __('Cancel') }}
            </button>
            <button
                class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                {{ __('Apply') }}
            </button>
        </div>
        @if ($make_field_fks = $this->make_field_fks)
            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                            <th
                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                {{ __('Modelo')}}:
                            </th>
                            <th
                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                {{ __('Fonte do R.')}}:
                            </th>
                            <th
                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                {{ __('R. Com')}}:
                            </th>
                            <th
                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                               {{ __(' Tipo')}}:
                            </th>
                            <th
                                class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                                #
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($make_field_fks as $make_field_fk)
                            @livewire('tall::admin.make.field.fk.edit-component', compact('make_field_fk'), key(sprintf('create-make-field-fk-%s-%s', $model->id, $make_field_fk->id)))
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </form>
</div>
