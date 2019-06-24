<?php


namespace App\Http\Controllers\Api\V1\Managements\ListsOption;


use App\Http\Controllers\Api\ApiController;
use App\Repositories\Contracts\ListsOptionsContract;

class Enable extends ApiController
{
    public function handle(int $id, ListsOptionsContract $contract)
    {
        $row = $contract->findOrFail($id);
        $contract->enable($row);

        return $this->render();
    }
}
