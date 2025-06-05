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
        Schema::create('property_specifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('specification_category_id')->index();
            $table->uuid('property_id')->index();
            $table->integer('view_order');
            $table->unique([
                'specification_category_id',
                'property_id',
            ], 'uniq_property_specification');
            $table->softDeletesDatetime();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_specifications');
    }
};
