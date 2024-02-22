<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buy_orders', function (Blueprint $table) {
            $table->id();
            // $table->string('buyer_id');
            // $table->string('first_name');
            // $table->string('last_name');

            // $table->string('email');
            // $table->string('phone_number');
            // $table->string('address');

            // $table->string('car_id');
            // $table->string('car_name');
            // $table->double('price', 15, 2);

            // $table->string('staff_id');
            // $table->string('staff_name');

            $table->unsignedBigInteger('buyer_id');
            $table->foreign('buyer_id')->references('id')->on('buyers');
            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')->references('id')->on('cars');
            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buy_orders');
    }
};
