<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Orm\Models\AbstractModel;

class MakeField extends AbstractModel
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $with = ['make_field_type'];

    public function make_field_type()
    {
        if(class_exists('\\App\\Models\\MakeFieldType')){
            return $this->belongsTo('\\App\\Models\\MakeFieldType');
        }
        return $this->belongsTo(MakeFieldType::class);
    }

    public function make_field_attributes()
    {
        if(class_exists('\\App\\Models\\MakeFieldAttribute')){
            return $this->hasMany('\\App\\Models\\MakeFieldAttribute');
        }
        return $this->hasMany(MakeFieldAttribute::class);
    }

    public function make_field_options()
    {
        if(class_exists('\\App\\Models\\MakeFieldOption')){
            return $this->hasMany('\\App\\Models\\MakeFieldOption');
        }
        return $this->hasMany(MakeFieldOption::class);
    }

    public function make_field_ob()
    {
        if(class_exists('\\App\\Models\\MakeFieldDb')){
            return $this->hasMany('\\App\\Models\\MakeFieldDb');
        }
        return $this->hasMany(MakeFieldDb::class);
    }

    public function make_field_fk()
    {
        if(class_exists('\\App\\Models\\MakeFieldFk')){
            return $this->hasMany('\\App\\Models\\MakeFieldFk');
        }
        return $this->hasMany(MakeFieldFk::class);
    }

    public function slugTo()
    {
        return false;
    }
}
