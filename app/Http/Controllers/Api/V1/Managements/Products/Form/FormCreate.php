<?php


namespace App\Http\Controllers\Api\V1\Managements\Products\Form;


use App\Helpers\FormValidate;

class FormCreate extends FormValidate
{
    protected $required = [
        'name'        => 'required|string|max:100',
        'description' => 'required|string',
        'price'       => 'required',
    ];

    protected $options = [
        'image_1' => 'image',
        'image_2' => 'image',
        'image_3' => 'image',
        'image_4' => 'image',
        'image_5' => 'image',
    ];

    public function inputs(): array
    {
        // TODO: Implement inputs() method.
        request()->merge(['user_id' => auth()->user()->id, 'user_id_update' => auth()->user()->id]);

        return request()->only(['name', 'description', 'price', 'user_id', 'user_id_update']);
    }

}
