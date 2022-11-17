<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Orm\Models\AbstractModel;

class MakePost extends AbstractModel
{
    use HasFactory;
    
    protected $guarded = ['id'];

    protected $with = ['make_post_items'];
    protected $appends = ['posts'];

    public function make_post_items()
    {
        if(class_exists('\\App\\Models\\MakePostItem')){
            return $this->hasMany('\\App\\Models\\MakePostItem')->orderBy('ordering');
        }
        return $this->hasMany(MakePostItem::class)->orderBy('ordering');
    }

    public function getPostsAttribute()
    {
        return $this->make_post_items()->pluck('name','make_field_id')->toArray();
    }

    public function slugTo()
    {
        return false;
    }
}
