<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOption\Write\Admin;


use App\Helpers\Trans\FormValueForLang;
use App\Helpers\Trans\TransService;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\Managements\ListsOption\Write\System\Admin\CreateOptionForm;
use App\Repositories\Contracts\ListsOptionsContract;
use App\Repositories\Contracts\ListsSelectsContract;
use Illuminate\Http\Request;

class CreateOptionController extends ApiController
{

    public function handle(
        int $id,
        Request $request,
        ListsSelectsContract $listsSelectContract,
        ListsOptionsContract $listsOptionsContract,
        TransService $transService
    ) {
        $form = new CreateOptionForm();
        $form->apiValidate($request);
        $listsSelectContract->findOrFail($id);
        $option           = $listsOptionsContract->add($form->inputs());
        $formValueForLang = new FormValueForLang($option->option_name, $request->all());
        $transService->add($formValueForLang->result(), false);

        return $this->render();
    }
}
