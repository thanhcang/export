<?php


namespace App\Http\Controllers\Api\V1\Managements\Products;


use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\Managements\Products\Form\FormEdit;
use App\Models\Managements\Products\Product;
use App\Repositories\Contracts\ProductContact;
use Illuminate\Http\Request;

class Edit extends ApiController
{
    public function __invoke(
        int $id,
        Request $request,
        FormEdit $form,
        ProductContact $contact,
        Product $product
    ) {
        // TODO: Implement __invoke() method.
        $form->apiValidate($request);
        $form->nameExist($request);
        $contact->update($id, $form->inputs());
        return $this->render();
    }
}
