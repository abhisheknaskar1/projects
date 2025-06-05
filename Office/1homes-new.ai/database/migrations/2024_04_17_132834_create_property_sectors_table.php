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
        Schema::create('property_sectors', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('property_id')->index();
            $table->string('code', 1024);
            $table->text('title');
            $table->integer('number_of_units')->nullable();
            $table->text('towers')->nullable();
            $table->text('floors')->nullable();
            $table->integer('view_order');
            $table->softDeletesDatetime();
            $table->timestamps();

            $table->unique([
               'property_id',
               'code',
            ], 'uniq_property_sector_code');
        });
        DB::statement('ALTER TABLE property_sectors ALTER COLUMN title TYPE CITEXT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_sectors');
    }
};
