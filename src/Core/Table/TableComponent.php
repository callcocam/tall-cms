<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Core\Table;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Route;
use Livewire\WithPagination;
use Tall\Orm\Http\Livewire\TableComponent as TableTableComponent;

abstract class TableComponent extends TableTableComponent
{
    use AuthorizesRequests, WithPagination;

    abstract protected function query();    

    public function mount()
    {
        $this->currentRouteName = Route::currentRouteName();
        $this->authorize($this->currentRouteName);
    }
    
    protected function data(){

        return [
            'models'=> $this->models()
        ];

    }
    
}
