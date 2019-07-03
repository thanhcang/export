<?php


namespace App\Models\Managements\Contacts;


use App\Models\BaseModel;

class Contact extends BaseModel
{
    protected $casts = [
        'interest' => 'array'
    ];
}
