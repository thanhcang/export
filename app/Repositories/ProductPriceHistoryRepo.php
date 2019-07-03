<?php


namespace App\Repositories;


use App\Models\Managements\Products\ProductPriceHistory;
use App\Repositories\Contracts\ProductPriceHistoryContact;

class ProductPriceHistoryRepo extends BaseRepo implements ProductPriceHistoryContact
{
    public function __construct(ProductPriceHistory $model)
    {
        $this->model = $model;
    }
}
