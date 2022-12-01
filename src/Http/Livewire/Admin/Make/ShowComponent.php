<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make;

use Tall\Cms\Contracts\IMake;
use Tall\Orm\Core\Migrations\MigrateGenerator;
use Tall\Orm\Http\Livewire\ShowComponent as LivewireShowComponent;

class ShowComponent extends LivewireShowComponent
{
     use MigrateGenerator;

    public function mount($model)
    {
        $this->setFormProperties(app(IMake::class)->find($model));
        
    }
    
    public function groupUpdatedOrder($data)
    {
      if($orders = parent::setGroupUpdatedOrder($data)){
        foreach($orders as $order => $id){
            if($model = $this->model->make_fields()->where('id', $id)->first()){
                $model->ordering= $order;
                $model->update();
            }
        }
      }
    }

    public function gerarApp()
    {
        try {
            $this->model->update($this->form_data);
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
            return true;
        } catch (\PDOException $PDOException) {
            $this->PDOException($PDOException);            
            return false;
        }
    }

    public function view($compnent="-component")
    {
        return 'tall::admin.make.show-component';
    }
}