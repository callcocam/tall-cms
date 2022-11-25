<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Tenant\Concerns\UsesLandlordConnection;

class MakeImport extends AbstractModel
{
    use HasFactory, UsesLandlordConnection;
    
    protected $guarded = ['id'];


    public function scopeModel(Builder $builder, string $model)
    {
       return $builder->whereModel($model);
    }
    

    public function scopeNotCompleted(Builder $builder)
    {
       return $builder->whereNull('completed_at');
    }
    

    public function percentageComplete(): int
    {
       return floor(($this->processed_rows / $this->total_rows) * 100);
    }
    
    public function slugTo(){
        return false;
    }
}
