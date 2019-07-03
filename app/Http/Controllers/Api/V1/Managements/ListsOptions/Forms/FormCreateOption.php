<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOption\Forms;


use App\Helpers\FormValidate;

class FormCreateOption extends FormValidate
{
    protected $required = [
        'option_name' => 'required|max:100',
    ];

    protected $options = [
        'background_color' => 'string|max:10',
        'color'            => 'string|max:10',
    ];

    protected $requiredForLang = true;

    public function inputs(): array
    {
        $optionName = preg_replace('/[^a-z]/', '_', request()->get('option_name'));
        request()->merge(['option_name' => $optionName]);
        request()->merge(['lists_selects_id' => request()->route()->parameter('id')]);
        return request()->only(['option_name', 'lists_selects_id']);
    }
}
