<?php


namespace App\Repositories\Contracts;


use App\Models\Managements\ListsSelect\ListsOptions;

interface ListsOptionsContract extends ModelContract
{
    public function enable(ListsOptions $model);

    public function disable(ListsOptions $model);
}
