<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOption\Write\Admin;


use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\Managements\ListsOption\ListsOption\Write\System\Admin\EditOptionForm;
use App\Repositories\Contracts\ListsOptionsContract;
use Illuminate\Http\Request;

class EditOptionController extends ApiController
{
    public function handle(int $id, Request $request, ListsOptionsContract $listsOptionsContract)
    {
        $form = new EditOptionForm();
        $form->apiValidate($request);

        $listsOptionsContract->findOrFail($id);
        $listsOptionsContract->update($id, $request->only($form->inputs()));

        return $this->render();
    }
}
