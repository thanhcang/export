<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOptions;


use App\Helpers\ListsSelects\ListsSelectException;
use App\Helpers\ListsSelects\ListsSelectService;
use App\Helpers\Trans\FormValueForLang;
use App\Helpers\Trans\TransService;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\Managements\ListsOption\Forms\FormCreateSelect;
use Illuminate\Http\Request;

class CreateSelect extends ApiController
{
    protected $checkPermission = true;
    protected $gateAbility = 'Managements.ListsOption.Created.Selects';

    public function __invoke(
        Request $request,
        ListsSelectService $listsSelectService,
        TransService $transService,
        FormCreateSelect $createSelectForm
    ) {

        $createSelectForm->apiValidate($request);

        try {
            $select           = $listsSelectService->model($createSelectForm->getModel())->add($createSelectForm->inputs());
            $formValueForLang = new FormValueForLang($select->select_name, $request->all());
            $transService->add($formValueForLang->result(), false);
            return $this->render();
        } catch (ListsSelectException $e) {
            return $this->render422($e->getMessage(), $e->getCode());
        }
    }
}
