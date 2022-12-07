<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make\Types;

use Illuminate\Support\Facades\Route;
use Tall\Orm\Http\Livewire\TableComponent;
use Tall\Table\Fields\Column;

class ListComponent extends TableComponent
{

    public function mount()
    {
        $this->setUp(Route::currentRouteName());
        
    }

    protected function query()
    {
        return app()->make(IMake::class)::query();
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
                Column::make('Edit')->icon('pencil')->route('admin.makes-field-types.edit'),
                Column::make('Show')->icon('eye')->route('admin.makes-field-types.show'),
                Column::make('Delete')->icon('trash')->route('admin.makes-field-types.delete'),
            ]),

        ];
    }
    
    protected function view($component= "-component")
    {
        return 'tall::admin.make.types.list-component';
    }
}
