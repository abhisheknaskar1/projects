<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('property_featured_amenities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('property_id')->index();
            $table->text('title');
            $table->integer('view_order');
            $table->softDeletesDatetime();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE property_featured_amenities ALTER COLUMN title TYPE CITEXT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_featured_amenities');
    }
};
