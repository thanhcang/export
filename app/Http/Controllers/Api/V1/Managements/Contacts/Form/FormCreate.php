<?php


namespace App\Http\Controllers\Api\V1\Managements\Contacts\Form;


use App\Helpers\FormValidate;

class FormCreate extends FormValidate
{
    protected $required = [
        'first_name' => 'required',
        'last_name'  => 'required',
        'zone_id'    => 'required|integer'
    ];

    protected $options = [
        'avatar'   => 'image',
        'email'    => 'email',
        'interest' => 'array'
    ];

    public function inputs(): array
    {
        // TODO: Implement inputs() method.
        return request()->only(
            [
                'first_name',
                'first_name',
                'phone',
                'email',
                'whatsapp',
                'linked',
                'source',
                'interest',
                'company',
                'country',
                'address',
                'postal_code',
                'notify_to_email',
                'notify_to_whapsapp',
                'notify_to_linked',
                'notify_to_sms',
                'comments'
            ]
        );
    }

}
