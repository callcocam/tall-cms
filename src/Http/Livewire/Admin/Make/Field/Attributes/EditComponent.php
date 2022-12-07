<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make\Field\Attributes;

use Tall\Orm\Http\Livewire\FormComponent;
use Tall\Cms\Models\MakeFieldAttribute;

class EditComponent extends FormComponent
{
    
    public function mount(MakeFieldAttribute $model)
    {
        $this->setFormProperties($model, false);
        
    }
    
    protected function view($component= "-component")
    {
        return 'tall::admin.make.field.attributes.edit-component';
    }
}
