<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListsOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model', 45);
            $table->string('select_name', 100);
            $table->string('option_name', 100);
            $table->boolean('option_show')->default(1);
            $table->text('notes')->nullable();
            $table->string('background_color', 20)->nullable(true);
            $table->string('color', 20)->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lists_options');
    }
}
