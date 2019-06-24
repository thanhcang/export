<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOption;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\Managements\ListsOption\Forms\CreateForTrans;
use App\Repositories\Contracts\ListsOptionsContract;
use App\Repositories\Contracts\ListsOptionTransContract;
use Illuminate\Http\Request;

class CrateOptionTitleController extends ApiController
{
    public function handle(int $id, Request $request, ListsOptionsContract $optionsContract, ListsOptionTransContract $transContract)
    {
        $optionsContract->findOrFail($id);

        $form = new CreateForTrans();
        $form->apiValidate($request);

        $row = $transContract->add($request->merge(['lists_option_id' => $id])->only($form->inputs()));
        $this->push('option', $row);
        return $this->render();
    }
}
