<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire;

use Livewire\Component;
 
abstract class AbstractComponent extends Component
{

    protected $currentRouteName;
    
    abstract protected function view($sufix="-component");
    
    protected function layout(){

        return "tall::layouts.app";

    }
    
    protected function layoutData(){

        return [];

    }
    
    protected function data(){

        return [];

    }

    public function render()
    {
        return view($this->view())
        ->with($this->data())
        ->layout($this->layout(), $this->layoutData());
    }
}
