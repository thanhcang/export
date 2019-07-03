<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOptions;


use App\Http\Controllers\Api\ApiController;
use App\Repositories\Contracts\ListsOptionsContract;

class DisableOption extends ApiController
{
    protected $checkPermission = true;
    protected $gateAbility = 'Managements.ListsOption.Disable.Option';

    public function __invoke(int $id, ListsOptionsContract $contract)
    {
        $row = $contract->findOrFail($id);
        $contract->disable($row);

        return $this->render();
    }
}
