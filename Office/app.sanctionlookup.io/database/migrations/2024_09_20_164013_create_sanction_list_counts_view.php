<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $sql = 'CREATE OR REPLACE VIEW sanction_list_counts AS'.PHP_EOL;
        $sql .= 'SELECT sanction_list_entities.sanction_list_id AS sanction_list_id,'.PHP_EOL;
        $sql .= 'COUNT(DISTINCT sanction_list_entities.id) AS number_of_entities,'.PHP_EOL;
        $sql .= 'COUNT(DISTINCT sanction_list_entity_names.id) AS number_of_names'.PHP_EOL;
        $sql .= 'FROM sanction_list_entities'.PHP_EOL;
        $sql .= 'LEFT JOIN sanction_list_entity_names ON'.PHP_EOL;
        $sql .= '(sanction_list_entity_names.sanction_list_entity_id = sanction_list_entities.id)'.PHP_EOL;
        $sql .= 'GROUP BY sanction_list_entities.sanction_list_id';
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS sanction_list_counts');
    }
};
