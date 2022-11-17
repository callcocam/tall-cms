<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Orm\Models\AbstractModel;

class Make extends AbstractModel
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $with = ['make_fields'];
    
    public function make_fields()
    {
        if(class_exists('\\App\\Models\\MakeField')){
            return $this->hasMany('\\App\\Models\\MakeField')->orderBy('ordering');
        }
        return $this->hasMany(MakeField::class)->orderBy('ordering');
    }
    
    public function make_field_fks()
    {
        if(class_exists('\\App\\Models\\MakeFieldFk')){
            return $this->hasMany('\\App\\Models\\MakeFieldFk');
        }
        return $this->hasMany(MakeFieldFk::class);
    }
    
    public function getMakeFieldsAttribute()
    {
        return $this->make_fields()->get();
    }
}
