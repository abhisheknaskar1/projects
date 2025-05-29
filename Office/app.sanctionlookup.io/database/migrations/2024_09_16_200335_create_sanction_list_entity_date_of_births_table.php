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
        Schema::create('sanction_list_entity_date_of_births', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('sanction_list_entity_id');
            $table->text('publisher_reference');
            $table->smallInteger('day_of_birth')->nullable();
            $table->smallInteger('month_of_birth')->nullable();
            $table->integer('year_of_birth')->nullable();
            $table->text('raw_value');
            $table->timestamp('publisher_listed_on')->nullable();
            $table->timestamp('publisher_de_listed_on')->nullable();
            $table->timestamps();
            $table->unique([
                'sanction_list_entity_id',
                'publisher_reference',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanction_list_entity_date_of_births');
    }
};
