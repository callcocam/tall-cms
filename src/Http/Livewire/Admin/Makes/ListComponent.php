<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Cms\Http\Livewire\Admin\Makes;

use Illuminate\Support\Facades\Route;
use Tall\Orm\Http\Livewire\TableComponent;
use Tall\Cms\Models\Make;
use Tall\Cms\Models\MakePost;
use Tall\Orm\Core\Table\Column;
use Illuminate\Support\{Str ,Arr};

class ListComponent extends TableComponent
{
   

    public function mount()
    {

        $this->setConfigProperties(Make::query()->whereIn('url', Route::current()->parameters)->first());
    }


      /**
     * @param null $config
     */
    protected function setConfigProperties($config = null, $moke=true)
    {
        if(!$config){
            abort(404);
        }
        $this->config = $config;
        
       $this->params[Str::lower($this->config->model)] = $this->config->url;
       
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
                ->make_field_attributes($make_field->make_field_attributes)
                ->make_field_options($make_field->make_field_options)
                ->make_field_db($make_field->make_field_db)
                ->make_field_fk($make_field->make_field_fk)
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
     * Rota para cadastra um novo registro
     * Voce deve sobrescrever essas informações no component filho (opcional)
     */
    protected function route_create()
    {
        if($this->config){
            $create = sprintf("%s.create",$this->config->route);
            if(Route::has($create )){
                $params=[];
                if($url = $this->config->url){
                    $params[Str::lower($this->config->model)] = $url;
                }
                return route($create , $params);
            }
        }
        return null;
    }
    
    // /**
    //  * Função final que faz a consulta no banco de dados
    //  * Voce pode sobrescrever essas informações no component filho
    //  * @return Builder
    //  */
    // public function models()
    // {
    //     if ( $builder = $this->query()) {
    //         return $builder->paginate(data_get($this->filters ,'perPage'));
    //     }
    // }
    protected function view($component="-component")
    {
        return sprintf('tall::admin.makes.list%s', $component);
    }

    // public static function getName()
    // {
    //     $namespace = collect(explode('.', str_replace(['/', '\\'], '.', config('livewire.class_namespace'))))
    //         ->map([Str::class, 'kebab'])
    //         ->implode('.');

    //     $fullName = collect(explode('.', str_replace(['/', '\\'], '.', static::class)))
    //         ->map([Str::class, 'kebab'])
    //         ->implode('.');

    //     if (str($fullName)->startsWith($namespace)) {
    //         return (string) str($fullName)->substr(strlen($namespace) + 1);
    //     }

    //     return $fullName;
    // }
}
