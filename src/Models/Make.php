<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Cms\Contracts\IMakeField;
use Tall\Cms\Contracts\IMakeFieldFk;
use Tall\Orm\Models\AbstractModel;
use Tall\Tenant\Concerns\UsesLandlordConnection;

class Make extends AbstractModel
{
    use HasFactory,UsesLandlordConnection;
    
    protected $guarded = ['id'];
    protected $with = ['make_fields'];
    
    public function make_fields()
    {
        return $this->hasMany(app(IMakeField::class))->orderBy('ordering');
    }
    
    public function make_field_fks()
    {
        return $this->hasMany(app(IMakeFieldFk::class));
    }
    
    public function getMakeFieldsAttribute()
    {
        return $this->make_fields()->get();
    }
}
