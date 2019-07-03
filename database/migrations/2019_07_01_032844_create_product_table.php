<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->text('description');
            $table->double('price', 15, 4);
            $table->bigInteger('user_id');
            $table->bigInteger('user_id_update');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products_image', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->string('name', 100)->nullable();
            $table->string('url');
            $table->string('driver')->default('local');
            $table->timestamps();
        });

        Schema::create('products_price_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->double('price', 15, 4);
            $table->bigInteger('user_id');
            $table->string('note')->nullable();
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('products_image');
        Schema::dropIfExists('products_price_history');
    }
}
