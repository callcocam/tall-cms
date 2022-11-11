<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make\Field\Fk;

use Tall\Form\Fields\Field;
use Tall\Orm\Http\Livewire\FormComponent;
use Tall\Cms\Models\Make;
use Tall\Cms\Models\MakeField;

class CreateComponent extends FormComponent
{

    public function mount(Make $model)
    {
        $this->setFormProperties($model);
    }
    
     /**
     * Salvar e continuar com um novo cadastro ou continuar com a atualização
     * Voce pode sobrescrever essas informações no component filho
     */
    public function saveAndStay()
    {
        $this->submit();
    }

      /**
     * pré tratamento e validações dos dados
     * Voce pode sobrescrever essas informações no component filho
     */
    public function submit()
    {
        if ($this->rules())
            $this->validate($this->rules());

        return $this->success();
    }
      /**
     * Monta um array de campos (opcional)
     * Voce pode sobrescrever essas informações no component filho
     * Uma opção e trazer essas informações do banco
     * @return array
     */
    protected function fields()
    {
        $models = app(Make::class)->query()->pluck('name','id')->toArray();

        $local_fields = app(MakeField::class)->query()
        ->where('make_id',data_get($this->model, 'id'))
        ->orderBy('ordering')->pluck('column_name','id')->toArray();

        $foreign_fields = app(MakeField::class)->query()
        ->where('make_id',data_get($this->form_data, 'make_field_fks.make_model_id'))
        ->orderBy('ordering')->pluck('column_name','id')->toArray();
        return [
            Field::select('Modelo','make_field_fks.make_model_id',$models)->rules('required'),
            Field::select('Fonte do relacionamento','make_field_fks.make_field_foreign_key_id', $foreign_fields )->rules('required')->span('6'),
            Field::select('Relacionar com','make_field_fks.make_field_local_key_id',$local_fields)->rules('required')->span('6'),
            Field::select('Tipo do relacionamento','make_field_fks.foreign_type', array_combine(['hasOne','hasMany','belongsTo','belongsToMany'],['Um a um','Um Para Muitos','Um para muitos (inverso)','Muitos Para Muitos']))->rules('required'),
        ];
    }

     /**
     * @param $callback uma função anonima para dar um retorno perssonalizado
     * Função de sucesso ou seja passou por todas as validações e agora pode ser salva no banco
     * Voce pode sobrescrever essas informações no component filho
     */
    protected function success($callback=null)
    {
        try {
            $this->model->make_field_fks()->create(data_get($this->form_data, 'make_field_fks'));
            /**
             * Informação para o PHP session
             */
            session()->flash('notification', ['text' => "Registro atualizado com sucesso!", 'variant'=>'success', 'time'=>3000, 'position'=>'right-top']);
            /**
             * Informação em forma de evento para o java script
             */
            $this->dispatchBrowserEvent('notification', ['text' => "Registro atualizado com sucesso!", 'variant'=>'success', 'time'=>3000, 'position'=>'right-top']);
            /**
             * Atualizar informações em components interlidados
             */
            $this->emit('refreshCreate', $this->model);

            $this->form_data['make_field_fks'] = [];

            return true;
        } catch (\PDOException $PDOException) {
            $this->PDOException($PDOException);       
            return false;
        }
    }


    public function getMakeFieldFksProperty()
    {
        return $this->model->make_field_fks;
    }

    protected function view($component= "-component")
    {
        return 'tall::admin.make.field.fk.create-component';
    }
}
