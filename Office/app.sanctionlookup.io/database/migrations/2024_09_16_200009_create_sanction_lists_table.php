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
        Schema::create('sanction_lists', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('is_enabled')->nullable()->default(false);
            $table->text('code')->unique();
            $table->text('short_title');
            $table->text('title');
            $table->text('description');
            $table->text('publisher');
            $table->text('uri')->nullable();
            $table->timestamp('publisher_last_updated_at')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE sanction_lists ALTER COLUMN code TYPE CITEXT');
        DB::statement('ALTER TABLE sanction_lists ALTER COLUMN short_title TYPE CITEXT');
        DB::statement('ALTER TABLE sanction_lists ALTER COLUMN title TYPE CITEXT');
        DB::statement('ALTER TABLE sanction_lists ALTER COLUMN description TYPE CITEXT');
        DB::statement('ALTER TABLE sanction_lists ALTER COLUMN publisher TYPE CITEXT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanction_lists');
    }
};
