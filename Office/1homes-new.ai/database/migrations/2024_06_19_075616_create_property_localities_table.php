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
        Schema::create('property_localities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code', 1024)->unique();
            $table->text('title');
            $table->text('description')->nullable();
            $table->softDeletesDatetime();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE property_categories ALTER COLUMN title TYPE CITEXT');
        DB::statement('ALTER TABLE property_categories ALTER COLUMN description TYPE CITEXT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_localities');
    }
};
