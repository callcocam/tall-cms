<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Providers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Livewire\Commands\ComponentParser as CommandsComponentParser;
use Livewire\LivewireComponentsFinder;
use Tall\Cms\Console\ComponentParser;
use Tall\Cms\Console\Commands\TallMakeCommand;
use Tall\Cms\LivewireComponentsFinder as LivewireLivewireComponentsFinder;
use Tall\Theme\Providers\ThemeServiceProvider;
use Livewire\Livewire;
use Tall\Cms\Contracts\Make;
use Tall\Cms\Contracts\MakeField;
use Tall\Cms\Contracts\MakeFieldAttribute;
use Tall\Cms\Contracts\MakeFieldDb;
use Tall\Cms\Contracts\MakeFieldFk;
use Tall\Cms\Contracts\MakeFieldOption;
use Tall\Cms\Contracts\MakeFieldType;
use Tall\Cms\Contracts\MakePost;
use Tall\Cms\Contracts\MakePostItem;
use Tall\Cms\Models\Make as ModelsMake;
use Tall\Cms\Models\MakeField as ModelsMakeField;
use Tall\Cms\Models\MakeFieldAttribute as ModelsMakeFieldAttribute;
use Tall\Cms\Models\MakeFieldDb as ModelsMakeFieldDb;
use Tall\Cms\Models\MakeFieldFk as ModelsMakeFieldFk;
use Tall\Cms\Models\MakeFieldOption as ModelsMakeFieldOption;
use Tall\Cms\Models\MakeFieldType as ModelsMakeFieldType;
use Tall\Cms\Models\MakePost as ModelsMakePost;
use Tall\Cms\Models\MakePostItem as ModelsMakePostItem;

class CmsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(class_exists('App\Models\Make')){
            $this->app->singleton(Make::class, 'App\Models\Make');
        }
        else{
            $this->app->singleton(Make::class, ModelsMake::class);
        }
        if(class_exists('App\Models\MakeField')){
            $this->app->singleton(MakeField::class, 'App\Models\MakeField');
        }
        else{
            $this->app->singleton(MakeField::class, ModelsMakeField::class);
        }

        if(class_exists('App\Models\MakeFieldAttribute')){
            $this->app->singleton(MakeFieldAttribute::class, 'App\Models\MakeFieldAttribute');
        }
        else{
            $this->app->singleton(MakeFieldAttribute::class, ModelsMakeFieldAttribute::class);
        }

        if(class_exists('App\Models\MakeFieldDb')){
            $this->app->singleton(MakeFieldDb::class, 'App\Models\MakeFieldDb');
        }
        else{
            $this->app->singleton(MakeFieldDb::class, ModelsMakeFieldDb::class);
        }

        if(class_exists('App\Models\MakeFieldFk')){
            $this->app->singleton(MakeFieldFk::class, 'App\Models\MakeFieldFk');
        }
        else{
            $this->app->singleton(MakeFieldFk::class, ModelsMakeFieldFk::class);
        }

        if(class_exists('App\Models\MakeFieldOption')){
            $this->app->singleton(MakeFieldOption::class, 'App\Models\MakeFieldOption');
        }
        else{
            $this->app->singleton(MakeFieldOption::class, ModelsMakeFieldOption::class);
        }

        if(class_exists('App\Models\MakeFieldType')){
            $this->app->singleton(MakeFieldType::class, 'App\Models\MakeFieldType');
        }
        else{
            $this->app->singleton(MakeFieldType::class, ModelsMakeFieldType::class);
        }

        if(class_exists('App\Models\MakePost')){
            $this->app->singleton(MakePost::class, 'App\Models\MakePost');
        }
        else{
            $this->app->singleton(MakePost::class, ModelsMakePost::class);
        }

        if(class_exists('App\Models\MakePostItem')){
            $this->app->singleton(MakePostItem::class, 'App\Models\MakePostItem');
        }
        else{
            $this->app->singleton(MakePostItem::class, ModelsMakePostItem::class);
        }

        if (class_exists(Livewire::class)) {
            if ($this->app->runningInConsole()) return;
            $this->app->register(RouteServiceProvider::class);
            $this->registerComponentAutoDiscovery();
        }
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/tall-cms.php','tall-cms'
        );

        $this->registerCommands();
        $this->publishViews();
        if(!is_dir(database_path('migrations/landlord'))){

            $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        }

        $this->publishes([
            __DIR__.'/../../database/' => database_path(),
        ], 'cms-database');

        if (class_exists(Livewire::class)) {
            
            Livewire::component('tall::admin.imports.csv-component',\Tall\Cms\Http\Livewire\Admin\Imports\CsvComponent::class);
            Livewire::component('tall::admin.imports.csv-imports-component',\Tall\Cms\Http\Livewire\Admin\Imports\CsvImportsComponent::class);
        

            Livewire::component( 'tall::admin.cms.makes.list-component', \Tall\Cms\Http\Livewire\Admin\Makes\ListComponent::class);
            Livewire::component( 'tall::admin.cms.makes.create-component', \Tall\Cms\Http\Livewire\Admin\Makes\CreateComponent::class);
            
            
            Livewire::component( 'tall::admin.cms.make.list-component', \Tall\Cms\Http\Livewire\Admin\Make\ListComponent::class);
            Livewire::component( 'tall::admin.cms.make.create-component', \Tall\Cms\Http\Livewire\Admin\Make\CreateComponent::class);
            Livewire::component( 'tall::admin.cms.make.edit-component', \Tall\Cms\Http\Livewire\Admin\Make\EditComponent::class);
            Livewire::component( 'tall::admin.cms.make.show-component', \Tall\Cms\Http\Livewire\Admin\Make\ShowComponent::class);
            Livewire::component( 'tall::admin.cms.make.delete-component', \Tall\Cms\Http\Livewire\Admin\Make\ShowComponent::class);
            
            Livewire::component( 'tall::admin.cms.make.field.create-component', \Tall\Cms\Http\Livewire\Admin\Make\Field\CreateComponent::class);
            Livewire::component( 'tall::admin.cms.make.field.edit-component', \Tall\Cms\Http\Livewire\Admin\Make\Field\EditComponent::class);
            
            Livewire::component( 'tall::admin.cms.make.field.attributes.create-component', \Tall\Cms\Http\Livewire\Admin\Make\Field\Attributes\CreateComponent::class);
            Livewire::component( 'tall::admin.cms.make.field.attributes.edit-component', \Tall\Cms\Http\Livewire\Admin\Make\Field\Attributes\EditComponent::class);
            
            Livewire::component( 'tall::admin.cms.make.field.fk.create-component', \Tall\Cms\Http\Livewire\Admin\Make\Field\Fk\CreateComponent::class);
            Livewire::component( 'tall::admin.cms.make.field.fk.edit-component', \Tall\Cms\Http\Livewire\Admin\Make\Field\Fk\EditComponent::class);
        }
        
    }
    protected function registerComponentAutoDiscovery()
    {
        if(!$this->app->has('livewire')) return;
        // Rather than forcing users to register each individual component,
        // we will auto-detect the component's class based on its kebab-cased
        // alias. For instance: 'examples.foo' => App\Http\Livewire\Examples\Foo

        // We will generate a manifest file so we don't have to do the lookup every time.
        $defaultManifestPath = $this->app['livewire']->isRunningServerless()
            ? '/tmp/storage/bootstrap/cache/livewire-components.php'
            : app()->bootstrapPath('cache/livewire-components.php');


        $this->app->extend(LivewireComponentsFinder::class, function () use ($defaultManifestPath) {
        
            $namespaces[]=[
                'path'=>CommandsComponentParser::generatePathFromNamespace(config('livewire.class_namespace')),
                'namespace'=>'\\App',
                'search'=>app_path()
            ];
            $namespaces[]=[
                'path'=> ComponentParser::generatePathFromNamespace(cms_core_path("\\Tall\\Cms\\Http\\Livewire")),
                'namespace'=>'\\Tall\\Cms\\',
                'search'=>cms_core_path()
            ];
            return new LivewireLivewireComponentsFinder(
                new Filesystem,$defaultManifestPath,
                $namespaces
            );
        });
    }

    protected function registerCommands()
    {
        if (! $this->app->runningInConsole()) return;

        $this->commands([
            TallMakeCommand::class, // make:livewire
        ]);
    }

    private function publishViews(): void
    {
        $pathViews = __DIR__ . '/../../resources/views';

        $pathViewsResources = resource_path('views/vendor/tall/cms');
        
        $this->publishes([
            $pathViews => $pathViewsResources,
        ], 'tall-cms-views');

        $this->loadViewsFrom($pathViews, 'tall');

        if(is_dir(resource_path('views/vendor/tall/cms')))
        {
            $pathViewsResources = resource_path('views/vendor/tall/cms');

            $this->loadViewsFrom($pathViewsResources, 'tall');

        }

        ThemeServiceProvider::configureDynamicComponent(__DIR__."/../../resources/views/components");
        if(is_dir(resource_path("views/vendor/tall/cms/components"))){
            ThemeServiceProvider::configureDynamicComponent(resource_path("views/vendor/tall/cms/components"));
        }
    }

}
