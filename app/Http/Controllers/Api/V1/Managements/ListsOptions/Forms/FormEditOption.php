<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOption\ListsOption\Forms;


use App\Helpers\FormValidate;

class FormEditOption extends FormValidate
{
    protected $options = [
        'background_color' => 'string|max:10',
        'color'            => 'string|max:10',
        'notes'            => 'string',
    ];

    public function inputs(): array
    {
        return ['notes', 'background_color', 'color'];
    }
}
