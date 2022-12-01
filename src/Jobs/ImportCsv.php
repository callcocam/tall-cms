<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Tall\Cms\Models\MakeImport;

class ImportCsv implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    use Batchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public MakeImport $import,public string $model,public array $chunks, public array $columns)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

       
        $values = [];

        foreach ($this->chunks as $chunk){
            $data = [];
            foreach ($this->columns as $name){
                $data[$name] = $chunk[$name];
            }
            $values[] = $data;
        }
      
       $affectedRows =  $this->model::upsert(
        $values,
        ['id'],
        collect($this->columns)->diff('id')->keys()->toArray()
       );

       $this->import->increment('processed_rows',$affectedRows);
       
       sleep(1);
    }
}
