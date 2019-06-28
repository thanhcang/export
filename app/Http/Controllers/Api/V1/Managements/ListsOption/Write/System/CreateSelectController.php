<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOption\Write\System;


use App\Helpers\ListsSelects\ListsSelectException;
use App\Helpers\ListsSelects\ListsSelectService;
use App\Helpers\Trans\FormValueForLang;
use App\Helpers\Trans\TransService;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\Managements\ListsOption\Write\System\Forms\CreateSelectForm;
use Illuminate\Http\Request;

class CreateSelectController extends ApiController
{
    protected $checkPermission = true;
    protected $gateAbility = 'ListsOption.Created.Selects';

    public function __invoke(
        Request $request,
        ListsSelectService $listsSelectService,
        TransService $transService
    ) {

        $form = new CreateSelectForm();
        $form->apiValidate($request);

        try {
            $select           = $listsSelectService->model($form->getModel())->add($request->only($form->inputs()));
            $formValueForLang = new FormValueForLang($select->select_name, $request->all());
            $transService->add($formValueForLang->result(), false);
            return $this->render();
        } catch (ListsSelectException $e) {
            return $this->render422($e->getMessage(), $e->getCode());
        }
    }
}
