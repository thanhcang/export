<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOptions;


use App\Http\Controllers\Api\ApiController;
use App\Repositories\Contracts\ListsOptionsContract;

class EnableOption extends ApiController
{
    protected $checkPermission = true;
    protected $gateAbility = 'Managements.ListsOption.Enable.Option';

    public function __invoke(int $id, ListsOptionsContract $contract)
    {
        $row = $contract->findOrFail($id);
        $contract->enable($row);

        return $this->render();
    }
}
