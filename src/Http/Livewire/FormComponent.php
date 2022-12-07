<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire;

use Tall\Orm\Http\Livewire\FormComponent as LivewireFormComponent;

abstract class FormComponent extends LivewireFormComponent
{
    
    
    
    public function closeModal()
    {
        $this->showModal = false;
    }
}
