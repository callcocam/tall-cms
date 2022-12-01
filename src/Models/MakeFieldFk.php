<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Cms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Cms\Contracts\IMake;
use Tall\Cms\Contracts\IMakeField;
use Tall\Orm\Models\AbstractModel;
use Tall\Tenant\Concerns\UsesLandlordConnection;

class MakeFieldFk extends AbstractModel
{
    use HasFactory, UsesLandlordConnection;
    
    protected $guarded = ['id'];

    protected $with = ['make','make_model','make_field_foreign','make_field_local'];

    public function make()
    {
        return $this->belongsTo(app(IMake::class));
    }
    public function make_model()
    {
        return $this->belongsTo(app(IMake::class),'make_model_id');
    }
    public function make_field_foreign()
    {
        return $this->belongsTo(app(IMakeField::class), 'foreign_key_id');
    }
    public function make_field_local()
    {
        return $this->belongsTo(app(IMakeField::class),'local_key_id');
    }
    public function slugTo()
    {
        return false;
    }
}
