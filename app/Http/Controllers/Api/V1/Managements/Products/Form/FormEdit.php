<?php


namespace App\Http\Controllers\Api\V1\Managements\Products\Form;


use App\Helpers\FormValidate;
use Illuminate\Http\Request;

class FormEdit extends FormValidate
{
    protected $required = [
        'name'        => ['required', 'string', 'max:100'],
        'description' => 'required|string',
        'price'       => 'required',
    ];

    public function inputs(): array
    {
        // TODO: Implement inputs() method.
        request()->merge(['user_id_update' => auth()->user()->id]);

        return request()->only(['name', 'description', 'price', 'user_id_update']);
    }

    public function nameExist(Request $request)
    {
        $this->required = [
            'name' => [new NameIsExits]
        ];

        $this->apiValidate($request);
    }
}
