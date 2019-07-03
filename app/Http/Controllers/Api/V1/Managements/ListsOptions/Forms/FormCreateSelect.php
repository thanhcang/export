<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOption\Forms;


use App\Helpers\FormValidate;
use App\Helpers\StrUtility;

class FormCreateSelect extends FormValidate
{
    protected $required = [
        'select_name' => 'required|max:100',
        'model'       => 'required|max:100'
    ];

    protected $requiredForLang = true;

    public function getModel()
    {
        return request()->get('model');
    }

    function inputs(): array
    {
        // TODO: Implement inputs() method.
        $selectName = StrUtility::concat([
            request()->get('model'),
            preg_replace('/[^a-z]/', '_', request()->get('select_name'))
        ], '__');

        request()->merge(['select_name' => $selectName]);
        return request()->only(['select_name', 'model']);
    }

}
