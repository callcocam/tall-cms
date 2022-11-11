<x-tall-app-form wire:submit.prevent="{{ data_get($formAttr, 'action', 'saveAndStay') }}" :formAttr="$formAttr" :$model :path>
    <x-slot name="messages">
        <x-tall-errors :$errors :$fields />
    </x-slot>
    @if ($fields)
        @foreach ($fields as $field)
            <x-tall-label :field="$field">
                <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                <x-tall-input-error :for="$field->key" />
            </x-tall-label>
        @endforeach
    @endif
</x-tall-app-form>
