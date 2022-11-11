<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin;

use Livewire\Component;
use Tall\Cms\Http\Livewire\AbstractComponent;

class DashboardComponent extends AbstractComponent
{
    protected function view($component= "-component")
    {
        return 'tall::admin.dashboard-component';
    }
}
