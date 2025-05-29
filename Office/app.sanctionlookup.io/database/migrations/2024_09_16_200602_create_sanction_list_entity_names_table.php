<?php

declare(strict_types=1);

use App\Enum\AliasStrength;
use App\Enum\NameType;
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
        Schema::create('sanction_list_entity_names', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('sanction_list_entity_id');
            $table->bigInteger('slenn')->comment('Sanction List Entity Name Number');
            $table->text('publisher_reference');
            $table->text('name');
            $table->enum('name_type', [
                NameType::PRIMARY->value,
                NameType::ALIAS->value,
            ])->nullable()->default(NameType::PRIMARY->value);
            $table->enum('strength', [
                AliasStrength::WEAK->value,
                AliasStrength::GOOD->value,
                AliasStrength::STRONG->value,
            ])->nullable()->default(null);
            $table->text('integrity_hash');
            $table->timestamp('publisher_listed_on')->nullable();
            $table->timestamp('publisher_de_listed_on')->nullable();
            $table->timestamps();
            $table->unique([
                'sanction_list_entity_id',
                'publisher_reference',
                'name_type',
            ]);
        });
        DB::statement('CREATE SEQUENCE sanction_list_entity_names_slenn_seq START WITH 1');
        DB::statement('ALTER TABLE sanction_list_entity_names ALTER COLUMN slenn SET DEFAULT nextval(\'sanction_list_entity_names_slenn_seq\')');
        DB::statement('ALTER SEQUENCE sanction_list_entity_names_slenn_seq OWNED BY sanction_list_entity_names.slenn');
        DB::statement('ALTER TABLE sanction_list_entity_names ALTER COLUMN publisher_reference TYPE CITEXT');
        DB::statement('ALTER TABLE sanction_list_entity_names ALTER COLUMN name TYPE CITEXT');
        DB::statement('CREATE INDEX sanction_list_entity_names_name_idx ON sanction_list_entity_names USING GIST (name gist_trgm_ops)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanction_list_entity_names');
    }
};
