<x-tall-app-show :showAttr="$showAttr">
    <x-slot name='filters'>
        <x-slot name="actions">
           <x-tall-modal >
              @livewire('tall::admin.make.field.fk.create-component', compact('model'))
           </x-tall-modal>
        </x-slot>
        <label class="block">
            <span>{{ __('Nome do projeto') }}:</span>
            <div class="relative mt-1.5 flex">
                <input wire:model.lazy='form_data.name'
                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="Enter Employer Name" type="text" />
                <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 transition-colors duration-200"
                        fill="none" viewbox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="1.5"
                            d="M3.082 13.944c-.529-.95-.793-1.425-.793-1.944 0-.519.264-.994.793-1.944L4.43 7.63l1.426-2.381c.559-.933.838-1.4 1.287-1.66.45-.259.993-.267 2.08-.285L12 3.26l2.775.044c1.088.018 1.631.026 2.08.286.45.26.73.726 1.288 1.659L19.57 7.63l1.35 2.426c.528.95.792 1.425.792 1.944 0 .519-.264.994-.793 1.944L19.57 16.37l-1.426 2.381c-.559.933-.838 1.4-1.287 1.66-.45.259-.993.267-2.08.285L12 20.74l-2.775-.044c-1.088-.018-1.631-.026-2.08-.286-.45-.26-.73-.726-1.288-1.659L4.43 16.37l-1.35-2.426z" />
                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" />
                    </svg>
                </span>
            </div>
        </label>
        <label class="block">
            <span>{{ __('Rota do projeto') }}:</span>
            <div class="relative mt-1.5 flex">
                <input wire:model.lazy='form_data.route'
                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="Enter Project Name" type="text" />
                <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 transition-colors duration-200"
                        fill="none" viewbox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="1.5"
                            d="M3.082 13.944c-.529-.95-.793-1.425-.793-1.944 0-.519.264-.994.793-1.944L4.43 7.63l1.426-2.381c.559-.933.838-1.4 1.287-1.66.45-.259.993-.267 2.08-.285L12 3.26l2.775.044c1.088.018 1.631.026 2.08.286.45.26.73.726 1.288 1.659L19.57 7.63l1.35 2.426c.528.95.792 1.425.792 1.944 0 .519-.264.994-.793 1.944L19.57 16.37l-1.426 2.381c-.559.933-.838 1.4-1.287 1.66-.45.259-.993.267-2.08.285L12 20.74l-2.775-.044c-1.088-.018-1.631-.026-2.08-.286-.45-.26-.73-.726-1.288-1.659L4.43 16.37l-1.35-2.426z" />
                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" />
                    </svg>
                </span>
            </div>
        </label>
        <label class="block">
            <span>{{ __('Modelo do projeto') }}:</span>
            <div class="relative mt-1.5 flex">
                <input wire:model.lazy='form_data.model'
                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="Enter Employer Name" type="text" />
                <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 transition-colors duration-200"
                        fill="none" viewbox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="1.5"
                            d="M3.082 13.944c-.529-.95-.793-1.425-.793-1.944 0-.519.264-.994.793-1.944L4.43 7.63l1.426-2.381c.559-.933.838-1.4 1.287-1.66.45-.259.993-.267 2.08-.285L12 3.26l2.775.044c1.088.018 1.631.026 2.08.286.45.26.73.726 1.288 1.659L19.57 7.63l1.35 2.426c.528.95.792 1.425.792 1.944 0 .519-.264.994-.793 1.944L19.57 16.37l-1.426 2.381c-.559.933-.838 1.4-1.287 1.66-.45.259-.993.267-2.08.285L12 20.74l-2.775-.044c-1.088-.018-1.631-.026-2.08-.286-.45-.26-.73-.726-1.288-1.659L4.43 16.37l-1.35-2.426z" />
                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" />
                    </svg>
                </span>
            </div>
        </label>
        <label class="block">
            <span>{{ __('View do projeto') }}:</span>
            <div class="relative mt-1.5 flex">
                <input wire:model.lazy='form_data.view'
                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="Enter Project Name" type="text" />
                <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 transition-colors duration-200"
                        fill="none" viewbox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="1.5"
                            d="M3.082 13.944c-.529-.95-.793-1.425-.793-1.944 0-.519.264-.994.793-1.944L4.43 7.63l1.426-2.381c.559-.933.838-1.4 1.287-1.66.45-.259.993-.267 2.08-.285L12 3.26l2.775.044c1.088.018 1.631.026 2.08.286.45.26.73.726 1.288 1.659L19.57 7.63l1.35 2.426c.528.95.792 1.425.792 1.944 0 .519-.264.994-.793 1.944L19.57 16.37l-1.426 2.381c-.559.933-.838 1.4-1.287 1.66-.45.259-.993.267-2.08.285L12 20.74l-2.775-.044c-1.088-.018-1.631-.026-2.08-.286-.45-.26-.73-.726-1.288-1.659L4.43 16.37l-1.35-2.426z" />
                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" />
                    </svg>
                </span>
            </div>
        </label>
        <div class="sm:col-span-2">
            <label class="block">
                <span>{{ __('Component do projeto') }}:</span>
                <div class="relative mt-1.5 flex">
                    <input wire:model.lazy='form_data.component'
                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Enter Project Name" type="text" />
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 transition-colors duration-200"
                            fill="none" viewbox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="1.5"
                                d="M3.082 13.944c-.529-.95-.793-1.425-.793-1.944 0-.519.264-.994.793-1.944L4.43 7.63l1.426-2.381c.559-.933.838-1.4 1.287-1.66.45-.259.993-.267 2.08-.285L12 3.26l2.775.044c1.088.018 1.631.026 2.08.286.45.26.73.726 1.288 1.659L19.57 7.63l1.35 2.426c.528.95.792 1.425.792 1.944 0 .519-.264.994-.793 1.944L19.57 16.37l-1.426 2.381c-.559.933-.838 1.4-1.287 1.66-.45.259-.993.267-2.08.285L12 20.74l-2.775-.044c-1.088-.018-1.631-.026-2.08-.286-.45-.26-.73-.726-1.288-1.659L4.43 16.37l-1.35-2.426z" />
                            <circle cx="12" cy="12" r="3" stroke="currentColor"
                                stroke-width="1.5" />
                        </svg>
                    </span>
                </div>
            </label>
        </div>
        <div class="sm:col-span-2">
            <span>{{ __('Selecione as opções desejadas') }}:</span>
            <div class="mt-2 grid grid-cols-1 gap-4 sm:grid-cols-4 sm:gap-5 lg:gap-6">
                <label class="inline-flex items-center space-x-2">
                    <input value="1" wire:model.lazy='form_data.genarate_model'
                        class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:border-secondary checked:bg-secondary hover:border-secondary focus:border-secondary dark:border-navy-400 dark:checked:border-secondary-light dark:checked:bg-secondary-light dark:hover:border-secondary-light dark:focus:border-secondary-light"
                        type="checkbox" />
                    <span>{{ __('Gerar model') }}</span>
                </label>
                <label class="inline-flex items-center space-x-2">
                    <input value="1" wire:model.lazy='form_data.genarate_migrate'
                        class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                        type="checkbox" />
                    <span>{{ __('Gerar Migrate') }}</span>
                </label>
                <label class="inline-flex items-center space-x-2">
                    <input value="1" wire:model.lazy='form_data.genarate_factory'
                        class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:!border-success checked:bg-success hover:!border-success focus:!border-success dark:border-navy-400"
                        type="checkbox" />
                    <span>{{ __('Gerar Factory') }}</span>
                </label>
                <label class="inline-flex items-center space-x-2">
                    <input value="1" wire:model.lazy='form_data.genarate_component'
                        class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:!border-error checked:bg-error hover:!border-error focus:!border-error dark:border-navy-400"
                        type="checkbox" />
                    <span>{{ __('Gerar Components') }}</span>
                </label>
            </div>
        </div>
    </x-slot>
    <table class="w-full text-left">
        <thead>
            <tr>
                <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                    {{ __('Nome') }}
                </th>
                <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                    {{ __('Tipo') }}
                </th>
                <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                    {{ __('Visivel') }}
                </th>
                <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                    {{ __('Largura') }}
                </th>
                <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                    {{ __('Ordem') }}
                </th>
                <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                    {{ __('Ação') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @livewire('tall::admin.make.field.create-component', compact('model'), key('create-make-field'))
            <tr>
                <td colspan="100">
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
