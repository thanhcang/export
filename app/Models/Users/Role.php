<?php


namespace App\Models\Users;


use App\Models\BaseModel;

class Role extends BaseModel
{
    protected $casts = [
        'permissions' => 'array'
    ];
}
