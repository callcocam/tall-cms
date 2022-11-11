<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Cms\Http\Livewire\Admin\Makes;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Orm\Http\Livewire\DeleteComponent as LivewireDeleteComponent;
use Tall\Theme\Models\Make;

class DeleteComponent extends LivewireDeleteComponent
{
    use AuthorizesRequests;

    public $title = "Excluir";

    public function mount($path, Make $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->path = $path;
        $this->setFormProperties($model);
    }

    public function redirectList()
    {
        $this->confirm--;

        if($this->confirm){

            return;
        }
        return $this->kill(sprintf('admin.%s.delete',$this->config->route));
    }

    public function getListProperty()
    {
        return sprintf('admin.%s',$this->config->route);
    }

    public function cancel()
    {
        return redirect()->route(sprintf('admin.%s', $this->config->route));
    }

    public function view($component="-component")
    {
        return 'tall::admin.makes.delete';
    }
}
