<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make;

use Illuminate\Support\Facades\Route;
use Tall\Orm\Http\Livewire\TableComponent;
use Tall\Cms\Models\Make;
use Tall\Table\Fields\Column;

class ListComponent extends TableComponent
{

    public function mount()
    {
        $this->setUp(Route::currentRouteName());
        
    }

    public function route()
    {
        Route::get('makes', static::class)->name('admin.makes');
    }
    protected function query()
    {
        return Make::query();
    }

    
    /**
     * Função para trazer uma lista de colunas (opcional)
     * Geralmente usada com um component de table dinamicas
     * Voce pode sobrescrever essas informações no component filho 
     */
    public function columns(){
        return [
            Column::make('Name'),
            Column::actions([
                Column::make('Edit')->icon('pencil')->route('admin.makes.edit'),
                Column::make('Delete')->icon('trash')->route('admin.makes.delete'),
            ]),

        ];
    }
    
    protected function view($component= "-component")
    {
        return 'tall::admin.make.list-component';
    }
}
