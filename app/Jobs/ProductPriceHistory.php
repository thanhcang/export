<?php

namespace App\Jobs;

use App\Models\Managements\Product;
use App\Repositories\Contracts\ProductPriceHistoryContact;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProductPriceHistory implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Product
     */
    private $product;

    /**
     * Create a new job instance.
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        //
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $history = app(ProductPriceHistoryContact::class);
        $history->add([
            'product_id' => $this->product->id,
            'price'      => $this->product->price,
            'user_id'    => $this->product->user_id
        ]);
    }
}
