<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Make;

use Tall\Orm\Core\Migrations\MigrateGenerator;
use Tall\Orm\Http\Livewire\ShowComponent as LivewireShowComponent;
use Tall\Cms\Models\Make;

class ShowComponent extends LivewireShowComponent
{
     use MigrateGenerator;

    public function mount(Make $model)
    {
        // dd($model->toArray());
        // if(!$model->make_fields->count()){
        //     $model->make_fields()->create([
        //         'column_name'=>'id',
        //         'column_type'=>'INT',
        //         'column_nullable'=>0,
        //         'column_primary'=>1,
        //         'column_index'=>1,
        //         'column_unique'=>1,
        //         'ordering'=>1,
        //     ]);
        //     $model->make_fields()->create([
        //         'column_name'=>'user_id',
        //         'column_type'=>'INT',
        //         'column_nullable'=>1,
        //         'column_primary'=>0,
        //         'column_index'=>1,
        //         'column_unique'=>0,
        //         'ordering'=>2,
        //     ]);

        //     $model->make_fields()->create([
        //         'column_name'=>'created_at',
        //         'column_type'=>'DATETIME',
        //         'column_nullable'=>1,
        //         'column_primary'=>0,
        //         'column_index'=>0,
        //         'column_unique'=>0,
        //         'ordering'=>98,
        //     ]);
            
        //     $model->make_fields()->create([
        //         'column_name'=>'updated_at',
        //         'column_type'=>'DATETIME',
        //         'column_nullable'=>1,
        //         'column_primary'=>0,
        //         'column_index'=>0,
        //         'column_unique'=>0,
        //         'ordering'=>99,
        //     ]);
            
        //     $model->make_fields()->create([
        //         'column_name'=>'deleted_at',
        //         'column_type'=>'DATETIME',
        //         'column_nullable'=>1,
        //         'column_primary'=>0,
        //         'column_index'=>0,
        //         'column_unique'=>0,
        //         'ordering'=>100,
        //     ]);
        //     $model->append('make_fields');
        // }

        $this->setFormProperties($model);
        
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