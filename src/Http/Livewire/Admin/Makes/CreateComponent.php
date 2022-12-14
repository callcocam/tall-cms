<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Cms\Http\Livewire\Admin\Makes;

use Illuminate\Support\Facades\Route;
use Tall\Orm\Http\Livewire\FormComponent;
use Tall\Cms\Models\Make;
use Tall\Cms\Models\MakePost;
use Tall\Form\Fields\Field;
use Illuminate\Support\{Str ,Arr};

class CreateComponent extends FormComponent
{

    public $title = "Cadastrar";
    public $path;

    public function mount(MakePost $model)
    {
        $this->setConfigProperties(Make::query()->whereIn('url', Route::current()->parameters)->first());   

        $this->setFormProperties($model);   
    }
   /**
     * Carrega os valores iniciais do component no carrgamento do messmo
     * O resulta final será algo do tipo form_data.name='Informação vinda do banco'
     * Voce pode sobrescrever essas informações no component filho
     */
    protected function setFormProperties($model = null, $moke=true)
    {
        $this->authorize($this->permission);
      
        $this->model = $model;

        if ($model) {
            $this->form_data = $model->toArray();
        }

        $this->setUp(  Route::currentRouteName() );

    }
     /**
     * Rota para editar um registro
     * Voce deve sobrescrever essas informações no component filho (opcional)
     */
    protected function route_list()
    {
        if($config = $this->config){
            if(Route::has($config->route)){
                $params=[];
                if($url = $this->config->url){
                    $params[Str::lower($this->config->model)] = $url;
                }
                return route($config->route, $params);
            }              
         }
        return null;
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

    
    /**
     * @param $callback uma função anonima para dar um retorno perssonalizado
     * Função de sucesso ou seja passou por todas as validações e agora pode ser salva no banco
     * Voce pode sobrescrever essas informações no component filho
     */
    protected function success($callback=null)
    {
        try {
            $this->model = $this->model->create([
                'make_id'=>$this->config->id
            ]);
            if ($this->model->exists) {
                foreach($this->form_data as $make_field_id => $name){
                    $this->model->make_post_items()->create(
                        [
                            "make_field_id"=>$make_field_id,
                            "name"=>$name
                        ]
                    );
                }                
                /**
                 * Informação para o PHP session
                 */
                session()->flash('notification', ['text' => "Registro criado com sucesso!", 'variant'=>'success', 'time'=>3000, 'position'=>'right-top']);
                /**
                * Informação em forma de evento para o java script
                */
                $this->dispatchBrowserEvent('notification', ['text' => "Registro criado com sucesso!", 'variant'=>'success', 'time'=>3000, 'position'=>'right-top']);
                /**
                * Atualizar informações em components interlidados
                */
                $this->emit('refreshCreate', $this->model);
                $params=[];
                $params['path'] = $this->config->url;
                $params['model'] = $this->model;
                return redirect()->route(sprintf('%s.edit',$this->config->route),$params);
            }
            return true;
        } catch (\PDOException $PDOException) {
            $this->PDOException($PDOException, $callback);
            dd($PDOException->getMessage());
            return false;
        }
    }
   
    protected function view($component="-component")
    {
        return sprintf('tall::admin.makes.create%s', $component);
    }
}
