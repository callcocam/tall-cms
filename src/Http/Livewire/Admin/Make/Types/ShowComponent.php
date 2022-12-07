<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make\Types;

use Tall\Cms\Contracts\IMakeFieldType;
use Tall\Orm\Core\Migrations\MigrateGenerator;
use Tall\Orm\Http\Livewire\ShowComponent as LivewireShowComponent;

class ShowComponent extends LivewireShowComponent
{
     use MigrateGenerator;

    public function mount($model)
    {
        $this->setFormProperties(app(IMakeFieldType::class)->find($model));
        
    }
    
    public function view($compnent="-component")
    {
        return 'tall::admin.make.types.show-component';
    }
}