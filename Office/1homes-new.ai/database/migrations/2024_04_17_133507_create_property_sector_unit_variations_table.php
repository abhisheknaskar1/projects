<?php
declare(strict_types=1);

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
        Schema::create('property_sector_unit_variations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('property_sector_unit_id')->index();
            $table->text('description')->nullable();
            $table->decimal('area', 20)->nullable();
            $table->decimal('min_area', 20)->nullable();
            $table->decimal('max_area', 20)->nullable();
            $table->string('area_type');
            $table->decimal('price', 20)->nullable();
            $table->decimal('min_price', 20)->nullable();
            $table->decimal('max_price', 20)->nullable();
            $table->text('layout_uri')->nullable();
            $table->integer('view_order');
            $table->float('no_of_bed')->nullable();
            $table->float('no_of_bath')->nullable();
            $table->float('no_of_kitchen')->nullable();
            $table->softDeletesDatetime();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_sector_unit_variations');
    }
};
