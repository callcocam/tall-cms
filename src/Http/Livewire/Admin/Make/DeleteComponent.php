<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make;

use Tall\Orm\Http\Livewire\DeleteComponent as LivewireDeleteComponent;

class DeleteComponent extends LivewireDeleteComponent
{
    public function view($compnent="-component")
    {
        return 'tall::admin.make.delete-component';
    }
}
