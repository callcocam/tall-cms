<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Cms\Http\Livewire\Admin\Makes;

use Tall\Cms\Models\MakePost;
use Tall\Orm\Http\Livewire\FormComponent;

class ShowComponent extends FormComponent
{

    public $title = "Visualizar";

    public function mount(MakePost $model)
    {
        $this->setFormProperties($model);
    }
   
    public function getListProperty()
    {
        return sprintf('admin.%s', $this->config->route);
    }

    public function getEditProperty()
    {
       return sprintf('admin.%s.edit',$this->config->route);
    }
    
    public function getDeleteProperty()
    {
       return sprintf('admin.%s.delete', $this->config->route);
    }

    protected function view($component="-component")
    {
        return sprintf('tall::admin.%s.show', data_get($this->config, 'view', 'makes'));
    }
}