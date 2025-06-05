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
        Schema::create('amenity_categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('code')->unique();
            $table->text('title');
            $table->softDeletesDatetime();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE amenity_categories ALTER COLUMN title TYPE CITEXT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenity_categories');
    }
};
