<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOption\Forms;


use App\Helpers\FormValidate;

class EditForTrans extends FormValidate
{
    protected $required = [
        'lists_option_id' => 'required',
        'lang'            => 'required|max:3',
        'option_title'    => 'required|max:625',
    ];

    public function inputs()
    {
        return ['option_title'];
    }
}
