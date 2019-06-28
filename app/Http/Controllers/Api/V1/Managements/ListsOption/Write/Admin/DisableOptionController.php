<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOption\Write\Admin;


use App\Http\Controllers\Api\ApiController;
use App\Repositories\Contracts\ListsOptionsContract;

class DisableOptionController extends ApiController
{
    public function handle(int $id, ListsOptionsContract $contract)
    {
        $row = $contract->findOrFail($id);
        $contract->disable($row);

        return $this->render();
    }
}
