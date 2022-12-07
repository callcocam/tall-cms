<div class="px-4 py-4 sm:px-5">

    <form wire:submit.prevent='saveAndStay' class="mt-4 space-y-4">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12">
                <label class="block flex-sm-wrap">
                    Cadastrar um novo tipo de campo, poder ser usado tanto na listagem quanto</br> nos formulários de
                    cadastro e
                    edição etc...
                </label>
            </div>
            @if ($field = form('name', $fields))
                <x-tall-label :$field>
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                </x-tall-label>
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
            @if ($field = form('view', $fields))
                <x-tall-label :$field>
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                </x-tall-label>
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
            @if ($field = form('description', $fields))
                <x-tall-label :$field>
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                </x-tall-label>
                {{-- <x-tall-input-error :for="$field->key" /> --}}
            @endif
        </div>
        <div class="space-x-2 text-right">
            <button wire:click="closeModal"
                class="btn min-w-[7rem]  rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                {{ __('Cancel') }}
            </button>
            <button
                class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                {{ __('Apply') }}
            </button>
        </div>
    </form>
</div>
