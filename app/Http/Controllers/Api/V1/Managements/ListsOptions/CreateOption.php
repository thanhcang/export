<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOptions;


use App\Helpers\Trans\FormValueForLang;
use App\Helpers\Trans\TransService;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\Managements\ListsOption\Forms\FormCreateOption;
use App\Repositories\Contracts\ListsOptionsContract;
use App\Repositories\Contracts\ListsSelectsContract;
use Illuminate\Http\Request;

class CreateOption extends ApiController
{
    protected $checkPermission = true;

    protected $gateAbility = 'Managements.ListsOption.Create.Option';

    public function __invoke(
        int $id,
        Request $request,
        ListsSelectsContract $listsSelectContract,
        ListsOptionsContract $listsOptionsContract,
        TransService $transService,
        FormCreateOption $form
    ) {
        $form->apiValidate($request);
        $listsSelectContract->findOrFail($id);
        $option           = $listsOptionsContract->add($form->inputs());
        $formValueForLang = new FormValueForLang($option->option_name, $request->all());
        $transService->add($formValueForLang->result(), false);

        return $this->render();
    }
}
