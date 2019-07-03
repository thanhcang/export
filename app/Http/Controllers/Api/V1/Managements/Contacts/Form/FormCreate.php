<?php


namespace App\Http\Controllers\Api\V1\Managements\Contacts\Form;


use App\Helpers\FormValidate;

class FormCreate extends FormValidate
{
    protected $required = [
        'first_name' => 'required',
        'last_name'  => 'required',
    ];

    protected $options = [
        'avatar' => 'image',
        'email'  => 'email'
    ];

    public function inputs(): array
    {
        // TODO: Implement inputs() method.
    }

}
