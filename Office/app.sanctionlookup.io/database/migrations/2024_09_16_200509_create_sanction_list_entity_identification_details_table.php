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
        Schema::create('sanction_list_entity_identification_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('sanction_list_entity_id');
            $table->text('publisher_reference');
            $table->text('id_type');
            $table->text('id_number');
            $table->text('integrity_hash');
            $table->timestamp('publisher_listed_on')->nullable();
            $table->timestamp('publisher_de_listed_on')->nullable();
            $table->timestamps();
            $table->unique([
                'sanction_list_entity_id',
                'publisher_reference',
            ]);
        });

        DB::statement('ALTER TABLE sanction_list_entity_identification_details ALTER COLUMN publisher_reference TYPE CITEXT');
        DB::statement('ALTER TABLE sanction_list_entity_identification_details ALTER COLUMN id_type TYPE CITEXT');
        DB::statement('ALTER TABLE sanction_list_entity_identification_details ALTER COLUMN id_number TYPE CITEXT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanction_list_entity_identification_details');
    }
};
