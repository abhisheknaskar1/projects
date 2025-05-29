<?php

declare(strict_types=1);

use App\Enum\SanctionEntityType;
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
        Schema::create('sanction_list_entities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('sanction_list_id');
            $table->enum('entity_type', [
                SanctionEntityType::INDIVIDUAL->value,
                SanctionEntityType::ENTITY->value,
                SanctionEntityType::VESSEL->value,
                SanctionEntityType::AIRCRAFT->value,
            ]);
            $table->bigInteger('slen')->comment('Sanction List Entity Number');
            $table->text('publisher_reference');
            $table->text('remark')->nullable();
            $table->text('integrity_hash');
            $table->timestamp('publisher_listed_on')->nullable();
            $table->timestamp('publisher_de_listed_on')->nullable();
            $table->timestamps();
            $table->unique([
                'sanction_list_id',
                'publisher_reference',
            ]);
        });
        DB::statement('CREATE SEQUENCE sanction_list_entities_slen_seq START WITH 1');
        DB::statement('ALTER TABLE sanction_list_entities ALTER COLUMN slen SET DEFAULT nextval(\'sanction_list_entities_slen_seq\')');
        DB::statement('ALTER SEQUENCE sanction_list_entities_slen_seq OWNED BY sanction_list_entities.slen');
        DB::statement('ALTER TABLE sanction_list_entities ALTER COLUMN publisher_reference TYPE CITEXT');
        DB::statement('ALTER TABLE sanction_list_entities ALTER COLUMN remark TYPE CITEXT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanction_list_entities');
    }
};
