<?php


namespace App\Models\Managements\ListsOptions;


use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListsOptions extends BaseModel
{

    use SoftDeletes;

    protected $table = 'lists_options';

    protected $hidden = ['created_at', 'updated_at'];
}
