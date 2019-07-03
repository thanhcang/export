<?php


namespace App\Http\Controllers\Api\V1\Managements\Products;


use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\Managements\Products\Form\FormCreate;
use App\Repositories\Contracts\ProductContact;
use Illuminate\Http\Request;

class Create extends ApiController
{
    public function __invoke(
        Request $request,
        FormCreate $form,
        ProductContact $contact
    ) {
        // TODO: Implement __invoke() method.
        $form->apiValidate($request);
        $contact->findOrFailForName($form->name);
        $contact->add($form->inputs());
        return $this->render();
    }
}
