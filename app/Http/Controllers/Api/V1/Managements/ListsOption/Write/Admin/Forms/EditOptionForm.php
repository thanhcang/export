<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOption\ListsOption\Write\System\Admin;


use App\Helpers\FormValidate;

class EditOptionForm extends FormValidate
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
