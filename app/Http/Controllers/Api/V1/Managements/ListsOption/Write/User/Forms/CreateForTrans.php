<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOption\Forms;


use App\Helpers\FormValidate;

class CreateForTrans extends FormValidate
{
    protected $required = [
        'lang'         => 'required|max:3',
        'option_title' => 'required|max:625',
    ];

    public function inputs()
    {
        return ['lang', 'option_title', 'lists_option_id'];
    }
}
