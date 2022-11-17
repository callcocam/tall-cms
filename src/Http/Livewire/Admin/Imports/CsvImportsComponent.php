<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Imports;

use Tall\Orm\Http\Livewire\ImportComponent;
use Tall\Cms\Models\Make;
use Tall\Cms\Models\MakeInport;

class CsvImportsComponent extends ImportComponent
{

    public function mount(Make $model)
    {
        $this->setFormProperties($model);
        
    }

    public function deleteImport(MakeInport $model)
    {
        $model->forceDelete();
    }

    public function getImportsProperty()
    {
        return auth()->user()->imports()->oldest()->notCompleted()->model($this->model->model)->get();
    }
   
    protected function view($component= "-component")
    {
        return 'tall::admin.imports.csv-imports-component';
    }
}
