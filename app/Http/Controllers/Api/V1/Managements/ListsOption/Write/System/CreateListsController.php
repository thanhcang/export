<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOption;


use App\Helpers\ListOptions\ListOptionException;
use App\Helpers\ListOptions\ListsOptionBridge;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\V1\Managements\ListsOption\Forms\Create;
use Illuminate\Http\Request;

class CreateListsController extends ApiController
{

    public function handle(Request $request)
    {
        $form = new Create();
        $form->apiValidate($request);

        try {
            $instance = ListsOptionBridge::instance($form->getFunctionName());
            $instance->add($request->merge(['model' => ''])->only($form->inputs()));
            return $this->render();
        } catch (ListOptionException $e) {
            return $this->render422($e->getMessage(), $e->getCode());
        }

    }
}
