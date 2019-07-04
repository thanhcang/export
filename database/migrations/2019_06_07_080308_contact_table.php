<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no', 100)->unique();
            $table->string('first_name', 40);
            $table->string('last_name', 80);
            $table->string('avatar')->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('linked')->nullable();
            $table->string('source')->nullable();
            $table->longText('interest')->nullable();
            $table->string('company', 100)->nullable();
            $table->string('country')->nullable();
            $table->integer('zone_id');
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->boolean('notify_to_email')->default(0);
            $table->boolean('notify_to_whapsapp')->default(0);
            $table->boolean('notify_to_linked')->default(0);
            $table->boolean('notify_to_sms')->default(0);
            $table->longText('comments')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
