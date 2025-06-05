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
        Schema::create('property_galleries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('property_id')->index();
            $table->text('gallery_uri');
            $table->integer('view_order');
            $table->softDeletesDatetime();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_galleries');
    }
};
