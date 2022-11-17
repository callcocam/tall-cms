<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Http\Livewire\Admin\Imports;

use App\Jobs\ImportCsv;
use Illuminate\Support\Facades\Bus;
use Livewire\WithFileUploads;
use Tall\Cms\Models\Make;
use Tall\Orm\Http\Livewire\ImportComponent;
use League\Csv\Reader;
use League\Csv\Statement;
use Tall\Cms\Helpers\ChunkIterator;

class CsvComponent extends ImportComponent
{
    use WithFileUploads;

    /**
     * @var $file Illuminate\Http\UploadedFile
     */
    public $file;

    public $showDrawer = false;


    public function mount(Make $model)
    {
        $this->setFormProperties($model);
        
    }

    public function toggleDrawer()
    {
        $this->showDrawer = !$this->showDrawer;
        $this->reset(['file','fileHeaders', 'columnMaps','requiredColumnMaps']);
        
    }

    public function updatedFile()
    {
        $this->validateOnly('file');

        $csv = $this->readCsv;

        $this->fileHeaders = $csv->getHeader();

        // $headers = $csv->getHeader();

        // $this->fileHeaders = collect($headers)->filter(function($header){

        //     return !in_array($header, ['deleted_at','created_at','updated_at','slug']);

        // })->toArray();


        $this->setColumnsProperties();

        $this->resetValidation();

    }

  public function readCsv($path)
  {
    $strem = fopen($path, 'r');

    $csv = Reader::createFromStream($strem);

    $csv->setHeaderOffset(0);

    return $csv;

  }

  public function getReadCsvProperty()
  {
    return $this->readCsv($this->file->getRealPath());
  }

  public function getCsvRecordsProperty()
  {
    return Statement::create()->process($this->readCsv);
  }

    public function rules()
    {
        $columnRules = collect($this->requiredColumnMaps)->mapWithKeys(fn($column)=>[sprintf('columnMaps.%s',$column)=>['required']])->toArray();
      
        return array_merge($columnRules, [

            'file'=>['required','mimes:csv','max:51200']

        ]);
    }

    public  function array_not_unique( $a = array() )
    {
      return array_diff_key( $a , array_unique( $a ) );
    }

    public function import()
    {
        
         $columnMaps = array_filter($this->columnMaps);

        if($dupliacates = $this->array_not_unique($columnMaps)){
            foreach ($dupliacates as $key => $value) {
                $this->addError(sprintf("columnMaps.%s",$key), sprintf("O %s esta selecionado em %s", $value, $key));
            }
            return false;
        }
        $this->validate();

    
       $import = $this->createImport();

        $batches = collect(

            (new ChunkIterator($this->csvRecords->getRecords(), 10))->get()

        )->map(function($chunk) use($import){
           
            return new ImportCsv($import, $this->model->model,$chunk, array_filter($this->columnMaps));

        })->toArray();
        

        Bus::batch($batches)->finally(function () use($import){
            $import->touch('completed_at');

        }) ->catch(function() use($import){
          //$import->delete();
        })
        ->dispatch();

        $this->reset(['file','fileHeaders', 'columnMaps','requiredColumnMaps']);

        $this->emit('refreshImport', null);
        
        
    }
   /**
    * return MakeImport
    */
    public function createImport(): mixed
    {
       return auth()->user()->imports()->create(
                [

                    'file_path'=> $this->file->getRealPath(),

                    'file_name'=> $this->file->getClientOriginalName(),

                    'model' => $this->model->model,

                    'total_rows' => count($this->csvRecords),

                ]
            );
    }

    public function validationAttributes()
    {
        return collect($this->requiredColumnMaps)->mapWithKeys(function($column){
            return [sprintf('columnMaps.%s', $column)=>$this->requiredColumnMaps[$column] ?? $column];
        })->toArray();
    }
        

    public function getColumnsProperty()
    {   
        return $this->columnMaps;
    }

   
    protected function view($component= "-component")
    {
        return 'tall::admin.imports.csv-component';
    }
}
