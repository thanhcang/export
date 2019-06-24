<?php


namespace App\Repositories;


use App\Models\Managements\ListsOptions\ListsOptions;
use App\Repositories\Contracts\ListsOptionsContract;

class ListsOptionsRepo extends BaseRepo implements ListsOptionsContract
{
    public function __construct(ListsOptions $listsOption)
    {
        $this->model = $listsOption;
    }

    public function enable(ListsOptions $model)
    {
        // TODO: Implement enable() method.
        $model->option_show = 1;
        $model->save();
    }

    public function disable(ListsOptions $model)
    {
        // TODO: Implement disable() method.
        $model->option_show = 0;
        $model->save();
    }

}
