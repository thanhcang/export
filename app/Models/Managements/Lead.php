<?php


namespace App\Models\Managements;


use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends BaseModel
{
    use SoftDeletes;

    protected $casts = [
        'option_show' => 'boolean'
    ];
}
