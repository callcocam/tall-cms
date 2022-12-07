<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make\Types;

use Tall\Cms\Contracts\IMakeFieldType;
use Tall\Cms\Models\Make;
use Tall\Form\Fields\Field;
use Tall\Form\FormComponent;

class CreateComponent extends FormComponent
{

    public function mount(Make $model)
    {
        $this->setFormProperties(app(IMakeFieldType::class));
        data_set($this->form_data, 'created_at', now()->format("Y-m-d"));
        data_set($this->form_data, 'updated_at', now()->format("Y-m-d"));
        data_set($this->form_data, 'status', 'published');
    }

    protected function fields()
    {
       
        return [
            Field::make('Nome do campo', 'name')->span(2)->rules('required'),
            Field::date('Data de criação','created_at')->span(6),
            Field::date('Última atualização', 'updated_at')->span(6),
        ];
    }

    protected function view($component= "-component")
    {
        return 'tall::admin.make.types.create-component';
    }
}
