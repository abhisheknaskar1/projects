<?php

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
        Schema::create('cities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('country_id')->index();
            $table->uuid('region_id')->index()->nullable();
            $table->string('code', 1024);
            $table->text('title');
            $table->decimal('lat', 20, 17)->nullable();
            $table->decimal('lng', 20, 17)->nullable();
            $table->softDeletesDatetime();
            $table->timestamps();
            $table->unique([
                'country_id',
                'region_id',
                'code',
            ]);
        });

        DB::statement('ALTER TABLE cities ALTER COLUMN title TYPE CITEXT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
