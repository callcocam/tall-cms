<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Cms\Contracts\IMakePostItem;
use Tall\Orm\Models\AbstractModel;
use Tall\Tenant\Concerns\UsesLandlordConnection;

class MakePost extends AbstractModel
{
    use HasFactory, UsesLandlordConnection;
    
    protected $guarded = ['id'];

    protected $with = ['make_post_items'];
    protected $appends = ['posts'];

    public function make_post_items()
    {
        return $this->hasMany(app(IMakePostItem::class))->orderBy('ordering');
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
