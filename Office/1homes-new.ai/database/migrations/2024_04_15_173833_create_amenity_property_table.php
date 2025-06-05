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
        Schema::create('amenity_property', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('amenity_id')->index();
            $table->uuid('property_id')->index();
            $table->integer('view_order');
            $table->unique([
               'amenity_id',
               'property_id',
            ], 'uniq_amenity_property');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenity_property');
    }
};
