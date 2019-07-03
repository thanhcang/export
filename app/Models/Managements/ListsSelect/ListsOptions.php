<?php


namespace App\Models\Managements\ListsSelect;


use App\Helpers\Lang\Lang;
use App\Models\BaseModel;
use App\Models\Managements\Trans\Trans;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListsOptions extends BaseModel
{
    protected $table = 'lists_options';

    use SoftDeletes;

    protected $casts = [
        'option_show' => 'boolean'
    ];

    public function trans()
    {
        return $this->hasMany(Trans::class, 'key', 'option_name');
    }

    public function currentTrans()
    {
        return $this->hasOne(Trans::class, 'key', 'option_name')
                    ->where('lang', Lang::getLocate());
    }
}
