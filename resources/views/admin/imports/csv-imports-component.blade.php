<div class="w-full" wire:poll.1s.visible>
    @if ($imports = $this->imports)
        @foreach ($imports as $import)
            <h1 class=>{{ $import->file_name }}</h1>
            <p class="text-sm text-gray-600 font-bold">
                {{ __('Imported :process/:rows rows', ['process' => $import->processed_rows, 'rows' => $import->total_rows]) }}
            </p>
            <div class=" flex justify-between items-center">
              <div class="flex-1">
                <div class="h-3 relative max-w-xl rounded-full overflow-hidden">
                    <div class="w-full h-full bg-gray-200 absolute"></div>
                    <div class="h-full bg-green-500 absolute" style="width:{{ $import->percentageComplete() }}%"></div>
                </div>
              </div>
                <button type="button" wire:click="deleteImport('{{ $import->id }}')"
                    class="btn h-8 w-8 rounded-full p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                    <x-tall-icon name="trash" />
                </button>
            </div>
        @endforeach
    @endif
</div>
