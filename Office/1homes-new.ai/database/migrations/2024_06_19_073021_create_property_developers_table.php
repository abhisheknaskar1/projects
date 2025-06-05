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
        Schema::create('property_developers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code')->unique();
            $table->string('title')->unique();
            $table->text('detail')->nullable();
            $table->text('developer_uri')->nullable();
            $table->softDeletesDatetime();
            $table->timestamps();
            $table->unique([
                'code',
                'title'
            ]);
        });

        DB::statement('ALTER TABLE property_developers ALTER COLUMN code TYPE CITEXT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_developers');
    }
};
