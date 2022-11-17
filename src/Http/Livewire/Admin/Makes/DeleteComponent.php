<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Cms\Http\Livewire\Admin\Makes;

use Tall\Cms\Models\MakePost;
use Tall\Orm\Http\Livewire\DeleteComponent as LivewireDeleteComponent;

class DeleteComponent extends LivewireDeleteComponent
{

    public $title = "Excluir";

    public function mount(MakePost $model)
    {
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
