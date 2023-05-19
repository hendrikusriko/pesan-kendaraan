<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->date('order_date');
            $table->unsignedBigInteger('staf_one');
            $table->unsignedBigInteger('staf_two');
            $table->integer('acc_mark');
            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('driver')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('vehicle_id')->references('id')->on('vehicle')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('staf_one')->references('id')->on('users')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('staf_two')->references('id')->on('users')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
