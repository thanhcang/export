<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOptions;


use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\Managements\ListsOption\ListsOption\Forms\FormEditOption;
use App\Repositories\Contracts\ListsOptionsContract;
use Illuminate\Http\Request;

class EditOption extends ApiController
{
    protected $checkPermission = true;
    protected $gateAbility = 'Managements.ListsOption.Edit.Option';

    public function __invoke(
        int $id,
        Request $request,
        ListsOptionsContract $listsOptionsContract,
        FormEditOption $form
    ) {
        $form->apiValidate($request);
        $listsOptionsContract->findOrFail($id);
        $listsOptionsContract->update($id, $request->only($form->inputs()));

        return $this->render();
    }
}
