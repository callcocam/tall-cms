<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Cms\Http\Livewire\Admin\Makes;

use Illuminate\Support\Facades\Route;
use Tall\Cms\Models\Make;
use Tall\Orm\Http\Livewire\FormComponent;
use Tall\Cms\Models\MakePost;
use Tall\Form\Fields\Field;

class EditComponent extends FormComponent
{

    public $title = "Editar";

    public function mount(MakePost $model)
    {
        $this->setConfigProperties(Make::query()->whereIn('url', collect(Route::current()->parameters)->forget('model')->toArray())->first());   
        $this->setFormProperties($model);   

    }

     /**
     * Carrega os valores iniciais do component no carrgamento do messmo
     * O resulta final será algo do tipo form_data.name='Informação vinda do banco'
     * Voce pode sobrescrever essas informações no component filho
     */
    protected function setFormProperties($model = null, $currentRouteName=null)
    {

        parent::setFormProperties($model, $currentRouteName);
        if ($model) {
            $this->form_data = data_get($model, 'posts');
        }
    }

      /**
     * Monta um array de campos (opcional)
     * Voce pode sobrescrever essas informações no component filho
     * Uma opção e trazer essas informações do banco
     * @return array
     */
    protected function fields()
    {
        $data = [];
        if($make_fields = $this->config->make_fields){
            foreach($make_fields as $make_field){
                $data[] = Field::make($make_field->column_name,$make_field->id)
                ->component($make_field->make_field_type->view);
            }
        }
        return $data;
    }
    
    protected function save(){ 
        try {
            foreach($this->data as $fluxo_field_id => $name){
                $data['name']=$name;
                $data['fluxo_field_id']=$fluxo_field_id;
                 if($model=  $this->model->fluxo_etapa_produto_items()
                 ->where('fluxo_field_id',$fluxo_field_id)
                 ->first()){
                    $model->update($data);
                }
                else{
                    $this->model->fluxo_etapa_produto_items()->create($data);
                }
            }
            $this->success( __('sucesso'), __("Cadastro atualizado com sucesso!!"));
            return true;
        } catch (\PDOException $PDOException) {
            $this->error('erro', __($PDOException->getMessage()));
            return false;
        }

    }
    
    public function getListProperty()
    {
        return sprintf('admin.%s', $this->config->route);
    }

    public function getFluxoEtapaItemsProperty()
    {
       return  $this->config->fluxo_etapa_items;
    }
    protected function view($component="-component")
    {
        return sprintf('tall::admin.makes.edit%s', $component);
    }
}
