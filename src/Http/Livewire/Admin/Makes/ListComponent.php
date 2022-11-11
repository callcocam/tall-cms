<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Cms\Http\Livewire\Admin\Makes;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Orm\Http\Livewire\TableComponent;
use Tall\Cms\Models\Make;
use Tall\Cms\Models\MakePost;
use Tall\Orm\Core\Table\Column;
use Illuminate\Support\{Str ,Arr};

class ListComponent extends TableComponent
{
    use AuthorizesRequests;
   
    public $path;

    public function mount()
    {
        $this->authorize(Route::currentRouteName());
        // $this->path = $path;
        $this->setFormProperties(Make::query()->whereIn('url', Route::current()->parameters)->first());
    }


      /**
     * @param null $config
     */
    protected function setConfigProperties($config = null, $currentRouteName=null)
    {
        if(!$config){
            abort(404);
        }
        $this->config = $config;
        
       $this->params[Str::lower($this->config->model)] = $this->config->url;;
       
    }

      /**
     * Função para trazer uma lista de colunas (opcional)
     * Geralmente usada com um component de table dinamicas
     * Voce pode sobrescrever essas informações no component filho 
     */
    public function columns(){
        $data = [];
        if($make_fields = $this->config->make_fields){
            foreach($make_fields as $make_field){
                $data[] = Column::make($make_field->column_name,$make_field->id)
                ->component($make_field->make_field_type->view);
            }
        }
        return $data;
    }

    public function query()
    {
          $builder =  MakePost::query();
    
          
        return $builder;
    }

    
    /**
     * Função final que faz a consulta no banco de dados
     * Voce pode sobrescrever essas informações no component filho
     * @return Builder
     */
    public function models()
    {
        if ( $builder = $this->query()) {
            return $builder->paginate(data_get($this->filters ,'perPage'));
        }
    }
    protected function view($component="-component")
    {
        return sprintf('tall::admin.makes.list%s', $component);
    }

}
