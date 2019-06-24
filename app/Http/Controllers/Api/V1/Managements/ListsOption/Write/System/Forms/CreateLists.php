<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOption\Forms;


use App\Helpers\FormValidate;

class CreateLists extends FormValidate
{
    protected $required = [
        'function'    => 'required|max:100',
        'select_name' => 'required|max:100',
        'option_name' => 'required|max:100',
    ];

    protected $options = [
        'background_color' => 'string|max:10',
        'color'            => 'string|max:10',
    ];

    public function getFunctionName()
    {
        return request()->get('function');
    }

    public function getSelectName()
    {
        return request()->get('select_name');
    }

    public function getOptionName()
    {
        return request()->get('option_name');
    }

    public function inputs()
    {
        return ['function', 'select_name', 'option_name', 'model', 'background_color', 'color', 'notes'];
    }
}
