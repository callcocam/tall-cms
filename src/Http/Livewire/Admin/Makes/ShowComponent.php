<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Cms\Http\Livewire\Admin\Makes;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Orm\Http\Livewire\FormComponent;
use Tall\Theme\Models\Make;

class ShowComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Visualizar";
    public $path;

    public function mount($path, Make $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->path = $path;
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