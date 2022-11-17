<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Orm\Models\AbstractModel;

class MakePostItem extends AbstractModel
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    public function make_post()
    {
        if(class_exists('\\App\\Models\\MakePost')){
            return $this->belongsTo('\\App\\Models\\MakePost');
        }
        return $this->belongsTo(MakePost::class);
    }
    
}
