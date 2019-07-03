<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogProcessDatabaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_process_database', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('action')->comment('we have 2 action for this model, they are deleted and edit');
            $table->string('table_name');
            $table->text('before');
            $table->text('after')->nullable();
            $table->bigInteger('user_id');
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
        Schema::dropIfExists('log_edit');
    }
}
