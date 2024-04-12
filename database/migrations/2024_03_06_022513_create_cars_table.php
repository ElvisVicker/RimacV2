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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('import_price', 15, 2);
            $table->double('export_price', 15, 2);
            $table->text('description')->nullable();
            $table->integer('quantity')->default(0);
            $table->string('model');
            $table->string('color');
            $table->string('fueltype');
            $table->integer('year');
            $table->string('image', 10000)->nullable();
            $table->integer('sittingfor');
            $table->string('transmission_type');
            $table->float('width');
            $table->float('height');
            $table->float('length');
            $table->float('wheelbase');
            $table->float('combined');
            $table->float('motorway');
            $table->float('urban');
            $table->float('emission_co2');
            $table->float('engine_size');
            $table->text('extra_equipment')->nullable();
            $table->float('maxKw');
            $table->float('maxHp');
            $table->float('acceleration');
            $table->boolean('status')->default(1);
            $table->string('slug', 255)->nullable();

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->unsignedBigInteger('car_category_id');
            $table->foreign('car_category_id')->references('id')->on('categories');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
