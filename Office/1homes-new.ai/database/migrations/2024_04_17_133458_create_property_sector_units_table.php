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
        Schema::create('property_sector_units', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('property_sector_id')->index();
            $table->uuid('property_unit_id');
            $table->integer('number_of_flats')->nullable();
            $table->integer('view_order');
            $table->softDeletesDatetime();
            $table->timestamps();

            $table->unique([
                'property_sector_id',
                'property_unit_id',
            ], 'uniq_property_sector_unit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_sector_units');
    }
};
