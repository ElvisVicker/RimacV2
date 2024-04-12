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
        Schema::table('cars', function (Blueprint $table) {
            // $table->unsignedBigInteger('import_detail_id');
            // $table->foreign('import_detail_id')->references('id')->on('import_details');
            // $table->unsignedBigInteger('export_detail_id');
            // $table->foreign('export_detail_id')->references('id')->on('export_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            //
        });
    }
};
