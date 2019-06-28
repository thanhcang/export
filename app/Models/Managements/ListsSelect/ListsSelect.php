<?php


namespace App\Models\Managements\ListsSelect;


use App\Helpers\Lang\Lang;
use App\Models\BaseModel;
use App\Models\Managements\Trans\Trans;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListsSelect extends BaseModel
{

    use SoftDeletes;

    protected $table = 'lists_selects';

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function trans()
    {
        return $this->hasMany(Trans::class, 'key', 'select_name');
    }

    public function currentTrans()
    {
        return $this->hasOne(Trans::class, 'key', 'select_name')
                    ->where('lang', Lang::getLocate());
    }
}
