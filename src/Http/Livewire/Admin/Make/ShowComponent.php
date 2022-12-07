<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make;

use Tall\Cms\Contracts\IMake;
// use Tall\Orm\Core\Migrations\MigrateGenerator;
use Tall\Orm\Http\Livewire\ShowComponent as LivewireShowComponent;

class ShowComponent extends LivewireShowComponent
{
    //  use MigrateGenerator;

    public function mount($model)
    {
        $this->setFormProperties(app(IMake::class)->find($model), false);
        
    }


    public function view($compnent="-component")
    {
        return 'tall::admin.make.show-component';
    }

    public function updatedFormDataGenarateAuthor($value)
    {
        dd($value);
    }

    public function updatedFormDataGenarateContent($value)
    {
        dd($value);
    }

    public function updatedFormDataGenarateStatus($value)
    {
        dd($value);
    }

    public function updatedFormDataGenarateTimestamps($value)
    {
        dd($value);
    }

}