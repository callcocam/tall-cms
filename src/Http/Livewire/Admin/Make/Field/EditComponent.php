<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make\Field;

use Tall\Form\Fields\Field;
use Tall\Orm\Http\Livewire\FormComponent;
use Tall\Cms\Models\MakeField;
use Tall\Cms\Models\MakeFieldType;

class EditComponent extends FormComponent
{
    
    public $make_field_attributes = true;

    public function mount(MakeField $make_field)
    {
        $this->setFormProperties($make_field);
    }
      /**
     * Monta um array de campos (opcional)
     * Voce pode sobrescrever essas informações no component filho
     * Uma opção e trazer essas informações do banco
     * @return array
     */
    protected function fields()
    {
        return [
            Field::make('column_name','column_name')->rules('required'),
            Field::select('column_type','make_field_type_id', MakeFieldType::query()->pluck('name','id')->toArray())->rules('required'),
            Field::checkbox('column_visible','column_visible'),
            Field::select('column_width','column_width',array_combine([1,2,3,4,5,6,7,8,9,10,11,12],[1,2,3,4,5,6,7,8,9,10,11,12])),
            Field::make('ordering','ordering')
        ];
    }

    protected function view($component= "-component")
    {
        return 'tall::admin.make.field.edit-component';
    }
}
