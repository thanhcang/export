<?php


namespace App\Http\Controllers\Api\V1\Managements\Leads\Form;


use App\Helpers\FormValidate;

class CreateForm extends FormValidate
{
    protected $required = [
        'first_name' => 'required|max:40',
        'last_name'  => 'required|max:80'
    ];

    protected $options = [
        'phone'    => 'max:20',
        'email'    => 'email',
        'whatsapp' => 'url',
        'linked'   => 'url',
        'source'   => 'url',
        'company'  => 'max:100',
        'address'  => 'max:255',
    ];

}
