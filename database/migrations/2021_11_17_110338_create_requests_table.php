<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->integer('userID')->default(0);
            $table->string('cluster');
            $table->string('block');
            $table->integer('floor');
            $table->integer('room');
            $table->string('fullname');

            $table->integer('requestType');
            $table->integer('requestCategory');
            $table->longtext('request');

            $table->string('priority')->default('normal');

            $table->timestamp('requestedTime')->useCurrent();
            $table->timestamp('deliveredTime')->nullable();
            $table->boolean('isDelivered')->default(false);
            $table->longtext('deliveryNote');

            $table->softDeletes();
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
        Schema::dropIfExists('requests');
    }
}
