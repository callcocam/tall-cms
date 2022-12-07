<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make\Field\Attributes;

use Tall\Form\Fields\Field;
use Tall\Form\FormComponent;
use Tall\Cms\Models\MakeField;

class CreateComponent extends FormComponent
{

    public $make_field_attributes;

    public function mount(MakeField $model)
    {
        $this->setFormProperties($model, false);
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
            Field::select('column_template','column_template')->component('select-types')->rules('required'),
            Field::select('column_span','column_span',array_combine([1,2,3,4,5,6,7,8,9,10,11,12],[1,2,3,4,5,6,7,8,9,10,11,12])),
            Field::checkbox('column_visible','column_visible'),
            Field::checkbox('column_sortable','column_sortable'),
            Field::checkbox('column_searchable','column_searchable'),
            Field::checkbox('column_fk','column_fk'),
        ];
    }
    
    protected function view($component= "-component")
    {
        return 'tall::admin.make.field.attributes.create-component';
    }
}
