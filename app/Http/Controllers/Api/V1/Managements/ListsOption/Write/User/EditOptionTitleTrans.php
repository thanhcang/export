<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOption;


use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\Managements\ListsOption\Forms\EditForTrans;
use App\Repositories\Contracts\ListsOptionTransContract;
use Illuminate\Http\Request;

class EditOptionTitleTrans extends ApiController
{
    public function handle(Request $request, ListsOptionTransContract $contract)
    {
        $form = new EditForTrans();
        $form->apiValidate($request);

        $contract->existOrFail($request->get('lists_option_id'), $request->get('lang'));

        $contract->updateOptionTitle(
            $request->get('lists_option_id'),
            $request->get('lang'),
            $request->only($form->inputs())
        );

        return $this->render();
    }
}
