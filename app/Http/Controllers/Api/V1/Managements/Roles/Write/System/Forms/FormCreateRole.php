<?php


namespace App\Http\Controllers\Api\V1\Managements\Roles\Write\System\Forms;


use App\Helpers\FormValidate;

class FormCreateRole extends FormValidate
{
    protected $required = [
        'name' => 'required|string'
    ];

    public function inputs(): array
    {
        // TODO: Implement inputs() method.

        return request()->only(['name']);
    }
}
