<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Livewire\LivewireComponentsFinder;
use Tall\Cms\Contracts\IMake;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('admin')
->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function(){

    Route::prefix('makes')->group(function () {
        Route::get('/', \Tall\Cms\Http\Livewire\Admin\Make\ListComponent::class)->name('admin.makes');
        Route::get('/cadastrar', \Tall\Cms\Http\Livewire\Admin\Make\CreateComponent::class)->name('admin.makes.create');
        Route::get('/{model}/editar', \Tall\Cms\Http\Livewire\Admin\Make\EditComponent::class)->name('admin.makes.edit');
        Route::get('/{model}/visualizar', \Tall\Cms\Http\Livewire\Admin\Make\ShowComponent::class)->name('admin.makes.show');
        Route::get('/{model}/excluir', \Tall\Cms\Http\Livewire\Admin\Make\DeleteComponent::class)->name('admin.makes.delete');
  
        Route::prefix('field/types')->group(function () {
            Route::get('/', \Tall\Cms\Http\Livewire\Admin\Make\Types\ListComponent::class)->name('admin.makes-field-types');
            Route::get('/cadastrar', \Tall\Cms\Http\Livewire\Admin\Make\Types\CreateComponent::class)->name('admin.makes-field-types.create');
            Route::get('/{model}/editar', \Tall\Cms\Http\Livewire\Admin\Make\Types\EditComponent::class)->name('admin.makes-field-types.edit');
            Route::get('/{model}/visualizar', \Tall\Cms\Http\Livewire\Admin\Make\Types\ShowComponent::class)->name('admin.makes-field-types.show');
            Route::get('/{model}/excluir', \Tall\Cms\Http\Livewire\Admin\Make\Types\DeleteComponent::class)->name('admin.makes-field-types.delete');
        });
  });


    $makes = app(IMake::class)->query()
    // ->where('status_id', 'published')
    ->whereNotNull('route')->get();
    
    if($makes){   
        foreach($makes as $make){
            Route::prefix($make->view)->group(function() use($make) {     
                    $model = Str::slug($make->model);      
                    if(class_exists(sprintf("%s\ListComponent", $make->component))){
                        
                        Route::get(sprintf("{%s}",$model ),sprintf("%s\ListComponent", $make->component))->name( $make->route); 
                    }
                    if(class_exists(sprintf("%s\CreateComponent", $make->component))){
                        Route::get(sprintf("{%s}/cadastrar",$model ),sprintf("%s\CreateComponent", $make->component))->name(sprintf("%s.create", $make->route));    
                    }
                    if(class_exists(sprintf("%s\EditComponent", $make->component))){
                        Route::get(sprintf("{%s}/{model}/editar",$model ),sprintf("%s\EditComponent", $make->component))->name(sprintf("%s.edit", $make->route)); 
                    }
                    if(class_exists(sprintf("%s\ShowComponent", $make->component))){
                        Route::get(sprintf("{%s}/{model}/vizualizr",$model ),sprintf("%s\ShowComponent", $make->component))->name(sprintf("%s.view", $make->route)); 
                    }
               }); 
        }
    }


    // if(method_exists(LivewireComponentsFinder::class, 'load')){

    //     $manifests =  app(LivewireComponentsFinder::class)->load();

    //     if($manifests){
    
    //         foreach($manifests as $manifest){
    
    //             if (method_exists($manifest, 'route')) {
    
    //                 app($manifest)->route();
    
    //             }
    
    //         }
    
    //     }
    // }

});