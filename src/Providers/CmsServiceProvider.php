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
use Tall\Cms\Contracts\IMake;
use Tall\Cms\Contracts\IMakeField;
use Tall\Cms\Contracts\IMakeFieldAttribute;
use Tall\Cms\Contracts\IMakeFieldDb;
use Tall\Cms\Contracts\IMakeFieldFk;
use Tall\Cms\Contracts\IMakeFieldOption;
use Tall\Cms\Contracts\IMakeFieldType;
use Tall\Cms\Contracts\IMakePost;
use Tall\Cms\Contracts\IMakePostItem;
use Tall\Cms\Models\Make;
use Tall\Cms\Models\MakeField;
use Tall\Cms\Models\MakeFieldAttribute;
use Tall\Cms\Models\MakeFieldDb;
use Tall\Cms\Models\MakeFieldFk;
use Tall\Cms\Models\MakeFieldOption;
use Tall\Cms\Models\MakeFieldType;
use Tall\Cms\Models\MakePost;
use Tall\Cms\Models\MakePostItem;

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
            $this->app->singleton(IMake::class, 'App\Models\Make');
        }
        else{
            $this->app->singleton(IMake::class, Make::class);
        }
        if(class_exists('App\Models\MakeField')){
            $this->app->singleton(IMakeField::class, 'App\Models\MakeField');
        }
        else{
            $this->app->singleton(IMakeField::class, MakeField::class);
        }

        if(class_exists('App\Models\MakeFieldAttribute')){
            $this->app->singleton(IMakeFieldAttribute::class, 'App\Models\MakeFieldAttribute');
        }
        else{
            $this->app->singleton(IMakeFieldAttribute::class, MakeFieldAttribute::class);
        }

        if(class_exists('App\Models\MakeFieldDb')){
            $this->app->singleton(IMakeFieldDb::class, 'App\Models\MakeFieldDb');
        }
        else{
            $this->app->singleton(IMakeFieldDb::class, MakeFieldDb::class);
        }

        if(class_exists('App\Models\MakeFieldFk')){
            $this->app->singleton(IMakeFieldFk::class, 'App\Models\MakeFieldFk');
        }
        else{
            $this->app->singleton(IMakeFieldFk::class, MakeFieldFk::class);
        }

        if(class_exists('App\Models\MakeFieldOption')){
            $this->app->singleton(IMakeFieldOption::class, 'App\Models\MakeFieldOption');
        }
        else{
            $this->app->singleton(IMakeFieldOption::class, MakeFieldOption::class);
        }

        if(class_exists('App\Models\MakeFieldType')){
            $this->app->singleton(IMakeFieldType::class, 'App\Models\MakeFieldType');
        }
        else{
            $this->app->singleton(IMakeFieldType::class, MakeFieldType::class);
        }

        if(class_exists('App\Models\MakePost')){
            $this->app->singleton(IMakePost::class, 'App\Models\MakePost');
        }
        else{
            $this->app->singleton(IMakePost::class, MakePost::class);
        }

        if(class_exists('App\Models\MakePostItem')){
            $this->app->singleton(IMakePostItem::class, 'App\Models\MakePostItem');
        }
        else{
            $this->app->singleton(IMakePostItem::class, MakePostItem::class);
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
            Livewire::component( 'tall::admin.cms.make.delete-component', \Tall\Cms\Http\Livewire\Admin\Make\DeleteComponent::class);
            
            
            Livewire::component( 'tall::admin.cms.make-field-types.list-component', \Tall\Cms\Http\Livewire\Admin\Make\Types\ListComponent::class);
            Livewire::component( 'tall::admin.cms.make-field-types.create-component', \Tall\Cms\Http\Livewire\Admin\Make\Types\CreateComponent::class);
            Livewire::component( 'tall::admin.cms.make-field-types.edit-component', \Tall\Cms\Http\Livewire\Admin\Make\Types\EditComponent::class);
            Livewire::component( 'tall::admin.cms.make-field-types.show-component', \Tall\Cms\Http\Livewire\Admin\Make\Types\ShowComponent::class);
            Livewire::component( 'tall::admin.cms.make-field-types.delete-component', \Tall\Cms\Http\Livewire\Admin\Make\Types\DeleteComponent::class);
            
            Livewire::component( 'tall::admin.cms.make.field.create-component', \Tall\Cms\Http\Livewire\Admin\Make\Field\CreateComponent::class);
            Livewire::component( 'tall::admin.cms.make.field.edit-component', \Tall\Cms\Http\Livewire\Admin\Make\Field\EditComponent::class);
            
            Livewire::component( 'tall::admin.cms.make.field.attributes.create-component', \Tall\Cms\Http\Livewire\Admin\Make\Field\Attributes\CreateComponent::class);
            Livewire::component( 'tall::admin.cms.make.field.attributes.edit-component', \Tall\Cms\Http\Livewire\Admin\Make\Field\Attributes\EditComponent::class);
            
            Livewire::component( 'tall::admin.cms.make.field.fk.create-component', \Tall\Cms\Http\Livewire\Admin\Make\Field\Fk\CreateComponent::class);
            Livewire::component( 'tall::admin.cms.make.field.fk.edit-component', \Tall\Cms\Http\Livewire\Admin\Make\Field\Fk\EditComponent::class);
           
            Livewire::component( 'tall::admin.make.field.type.create-component', \Tall\Cms\Http\Livewire\Admin\Make\Field\Type\CreateComponent::class);
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
