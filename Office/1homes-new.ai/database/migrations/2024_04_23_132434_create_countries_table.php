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
        Schema::create('countries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('iso_alpha_2', 2)->unique();
            $table->string('iso_alpha_3', 3)->unique();
            $table->integer('iso_numeric')->unique();
            $table->text('title');
            $table->softDeletesDatetime();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE countries ALTER COLUMN title TYPE CITEXT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
