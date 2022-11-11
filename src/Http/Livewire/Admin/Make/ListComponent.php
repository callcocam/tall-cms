<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make;

use Illuminate\Support\Facades\Route;
use Tall\Orm\Http\Livewire\TableComponent;
use Tall\Cms\Models\Make;

class ListComponent extends TableComponent
{

    public function mount()
    {
        $this->setUp(Route::currentRouteName());
        
    }

    public function route()
    {
        Route::get('makes', static::class)->name('admin.makes');
    }
    protected function query()
    {
        return Make::query();
    }

    protected function view($component= "-component")
    {
        return 'tall::admin.make.list-component';
    }
}
