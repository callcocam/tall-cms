<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make\Types;

use Tall\Cms\Contracts\IMakeFieldType;
use Tall\Form\Fields\Field;
use Tall\Orm\Http\Livewire\FormComponent;

class EditComponent extends FormComponent
{
    
    public function mount($model)
    {
        $this->setFormProperties(app(IMakeFieldType::class)->find($model));
        
    }
    
    protected function fields()
    {
       
        return [
            Field::make('Nome do campo', 'name')->span(2)->rules('required'),
            Field::status('Situação doAPP','status_id', ['published','draft']),
            Field::textarea('Descrição do uso do APP','description'),
            Field::date('Data de criação','created_at')->span(6),
            Field::date('Última atualização', 'updated_at')->span(6),
        ];
    }
    protected function view($component= "-component")
    {
        return 'tall::admin.make.types.edit-component';
    }
}
