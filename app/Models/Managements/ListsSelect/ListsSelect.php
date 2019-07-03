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

    public function options()
    {
        return $this->hasMany(ListsOptions::class, 'lists_selects_id');
    }

}
