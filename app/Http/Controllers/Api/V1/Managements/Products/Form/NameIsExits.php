<?php


namespace App\Http\Controllers\Api\V1\Managements\Products\Form;


use App\Helpers\Lang\Lang;
use App\Repositories\Contracts\ProductContact;
use Illuminate\Contracts\Validation\Rule;

class NameIsExits implements Rule
{
    public function passes($attribute, $value)
    {
        // TODO: Implement passes() method.
        $product = app(ProductContact::class);
        $row     = $product->findForName($value);

        if ($row === null) {
            return true;
        }

        if ($row->id === (int) request()->route()->parameter('id')) {
            return true;
        }

        return false;
    }

    public function message()
    {
        // TODO: Implement message() method.
        return Lang::get('validation.exists');
    }

}
