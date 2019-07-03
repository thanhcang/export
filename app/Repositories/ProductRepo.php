<?php


namespace App\Repositories;


use App\Helpers\Lang\Lang;
use App\Models\Managements\Products\Product;
use App\Repositories\Conditions\ProductCondition;
use App\Repositories\Contracts\ProductContact;

class ProductRepo extends BaseRepo implements ProductContact
{
    use ProductCondition;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function findOrFailForName(string $name)
    {
        // TODO: Implement findOrFailForName() method.
        $row = $this->model->where($this->forName($name));

        if ($row->count() > 0) {
            abort(403, Lang::get('database.row_exists'));
        }

        return $row->first();
    }

    public function findForName(string $name)
    {
        // TODO: Implement findForName() method.

        return $this->model->where($this->forName($name))->first();
    }

}
