<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleForUserstable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->integer('role_id')
                  ->default(0)
                  ->after('email');

            $table->longText('permissions')
                  ->nullable()
                  ->after('role_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('role_id');
        Schema::drop('permissions');
    }
}
