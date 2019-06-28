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
            $table->bigInteger('lists_selects_id');
            $table->string('option_name')->unique();
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
