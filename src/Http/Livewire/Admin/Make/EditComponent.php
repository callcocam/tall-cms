<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make;

use Tall\Form\Fields\Field;
use Tall\Orm\Http\Livewire\FormComponent;
use Tall\Cms\Models\Make;

class EditComponent extends FormComponent
{
    
    public function mount(Make $model)
    {
        $this->setFormProperties($model);
        
    }
    
    protected function fields()
    {
       
        return [
            Field::make('Nome do app', 'name')->span(2)->rules('required'),
            Field::make('Nome da rota','route')->span(4)->rules('required'),
            Field::make('Url de accesso exemplo ( posts ) saida (/admin/posts)','url')->span(6)->rules('required'),
            Field::make('Nome da modelo para comunicação com o banco','model')->span(4),
            Field::make('Nome da tabela para o CRUD','table_name')->span(4),
            Field::make('Por padrão usa as views que estão dentro pasta makes','view')->span(4)->rules('required'),
            Field::make('Por padrão usa os components dentro de  \\Tall\\Cms\\Http\\Livewire\\Admin\\Makes','component')->rules('required'),
            Field::radio('Situação doAPP','status', ['published','draft']),
            Field::textarea('Descrição do uso do APP','description'),
            Field::date('Data de criação','created_at')->span(6),
            Field::date('Última atualização', 'updated_at')->span(6),
        ];
    }
    protected function view($component= "-component")
    {
        return 'tall::admin.make.edit-component';
    }
}
