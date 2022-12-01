<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make;

use Illuminate\Support\Facades\Route;
use Tall\Cms\Contracts\IMake;
use Tall\Orm\Http\Livewire\DeleteComponent as LivewireDeleteComponent;

class DeleteComponent extends LivewireDeleteComponent
{

      /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro selecionado
    |
    */
    public function mount($model)
    {
        
        $this->setFormProperties(app(IMake::class)->find($model), Route::currentRouteName()); // $tenant from hereon, called $this->model
    }

    public function view($compnent="-component")
    {
        return 'tall::delete';
    }
}
