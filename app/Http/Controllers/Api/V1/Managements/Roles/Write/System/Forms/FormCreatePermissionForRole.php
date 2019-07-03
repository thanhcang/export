<?php


namespace App\Http\Controllers\Api\V1\Managements\Roles\Write\System\Forms;


use App\Helpers\FormValidate;

class FormCreatePermissionForRole extends FormValidate
{
    protected $required = [
        'permissions' => 'required|array'
    ];

    function inputs(): array
    {
        // TODO: Implement inputs() method.
        return request()->only(['permissions']);
    }


}
