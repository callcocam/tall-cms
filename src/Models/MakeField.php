<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Cms\Contracts\IMakeFieldAttribute;
use Tall\Cms\Contracts\IMakeFieldDb;
use Tall\Cms\Contracts\IMakeFieldFk;
use Tall\Cms\Contracts\IMakeFieldOption;
use Tall\Cms\Contracts\IMakeFieldType;
use Tall\Orm\Models\AbstractModel;
use Tall\Tenant\Concerns\UsesLandlordConnection;

class MakeField extends AbstractModel
{
    use HasFactory, UsesLandlordConnection;
    
    protected $guarded = ['id'];
    protected $with = ['make_field_type'];

    public function make_field_type()
    {
        return $this->belongsTo(app(IMakeFieldType::class));
    }

    public function make_field_attributes()
    {
        return $this->hasMany(app(IMakeFieldAttribute::class));
    }

    public function make_field_options()
    {
        return $this->hasMany(app(IMakeFieldOption::class));
    }

    public function make_field_ob()
    {
        return $this->hasMany(app(IMakeFieldDb::class));
    }

    public function make_field_fk()
    {
        return $this->hasMany(app(IMakeFieldFk::class));
    }

    public function slugTo()
    {
        return false;
    }
}
