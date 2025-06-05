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
        Schema::create('property_featured_amenity_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('property_featured_amenity_id')->index();
            $table->uuid('amenity_id')->index();
            $table->integer('view_order');
            $table->unique([
                'property_featured_amenity_id',
                'amenity_id',
            ], 'uniq_property_featured_amenity_item');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_featured_amenity_items');
    }
};
