<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimateProductPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimate_product_price', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 625);
            $table->bigInteger('parent_id');
            $table->integer('quantity');
            $table->double('amount', 15, 3)->default(0);
            $table->double('tax', 15, 3)->default(0);
            $table->double('service', 15, 3)->default(0);
            $table->double('sales', 15, 3)->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimate_product_price');
    }
}
