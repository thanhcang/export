<?php

namespace App\Observers;

use App\Jobs\ProductPriceHistory;
use App\Models\Managements\Product;

class ProductObserver
{
    public function created(Product $product)
    {
        dispatch(new ProductPriceHistory($product))->onQueue('price.product.history');
    }

    /**
     * @param Product $product
     */
    public function updated(Product $product)
    {
        dispatch(new ProductPriceHistory($product))->onQueue('price.product.history');
    }
}
