<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make\Field\Type;

use Tall\Form\Fields\Field;
use Tall\Orm\Http\Livewire\FormComponent;
use Tall\Cms\Models\MakeFieldType;

class CreateComponent extends FormComponent
{

    public function mount()
    {
        $this->setFormProperties(MakeFieldType::make($this->blankModel()),false);
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
     * Salvar e continuar com um novo cadastro ou continuar com a atualização
     * Voce pode sobrescrever essas informações no component filho
     */
    public function closeModal()
    {
        $this->reset(['form_data']);
            
        $this->emit('refreshCreate', []);
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
 
        return [
            Field::text('Nome do campo','name')->rules('required')->span('6'),
            Field::select('Visualização','view')->rules('required')->component('select-types')->span('6'),
            Field::text('Descrição','description')->rules('required'),
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
            $this->model->create($this->form_data);
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

            $this->reset(['form_data']);
            
            $this->showModal = false;

            return true;
        } catch (\PDOException $PDOException) {
            $this->PDOException($PDOException);       
            return false;
        }
    }

    protected function view($component= "-component")
    {
        return 'tall::admin.make.field.type.create-component';
    }
}
