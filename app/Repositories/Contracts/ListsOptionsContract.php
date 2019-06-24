<?php


namespace App\Repositories\Contracts;


use App\Models\Managements\ListsOptions\ListsOptions;

interface ListsOptionsContract extends ModeContract
{
    public function enable(ListsOptions $model);

    public function disable(ListsOptions $model);
}
