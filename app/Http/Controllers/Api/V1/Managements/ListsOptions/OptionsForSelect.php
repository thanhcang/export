<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOptions;


use App\Http\Controllers\Api\ApiController;
use App\Repositories\Contracts\ListsSelectsContract;
use Illuminate\Http\Request;

class OptionsForSelect extends ApiController
{
    public function __invoke(Request $request, ListsSelectsContract $contract)
    {
        // TODO: Implement __invoke() method.
        $this->push('options', $contract->optionsForName($request->get('name')));
        return $this->render();
    }
}
