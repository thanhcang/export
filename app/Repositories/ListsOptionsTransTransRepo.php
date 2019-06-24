<?php


namespace App\Repositories;


use App\Models\Managements\ListsOptionsTrans;
use App\Repositories\Contracts\ListsOptionTransContract;

class ListsOptionsTransTransRepo extends BaseRepo implements ListsOptionTransContract
{
    public function __construct(ListsOptionsTrans $model)
    {
        $this->model = $model;
    }

    public function existOrFail(int $listOptionId, string $lang)
    {
        // TODO: Implement existOrFail() method.
        $row = $this->model->where('lists_option_id', $listOptionId)
                           ->where('lang', $lang)->first();

        if ($row !== null) {
            return $row;
        }
        abort(404, 'page not found');
    }

    public function updateOptionTitle(int $listOptionId, string $lang, array $data): void
    {
        // TODO: Implement updateOptionTitle() method.
        $this->model->where('lists_option_id', $listOptionId)
                    ->where('lang', $lang)
                    ->update($data);
    }


}
