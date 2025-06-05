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
        Schema::create('property_category_slides', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('property_category_id')->index();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('cta_label')->nullable();
            $table->text('cta_action')->nullable();
            $table->text('image_uri');
            $table->integer('view_order');
            $table->softDeletesDatetime();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_category_slides');
    }
};
