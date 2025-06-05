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
        Schema::create('properties', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('property_category_id')->index();
            $table->uuid('property_locality_id')->index();
            $table->uuid('resident_type_id')->index();
            $table->string('code', 1024)->unique();
            $table->string('title', 1024);
            $table->text('price_bracket');
            $table->text('project_size')->nullable();
            $table->string('banner_content', 1024)->nullable();
            $table->text('google_map');
            $table->text('summary');
            $table->text('detail');
            $table->text('specification_welcome_text')->nullable();
            $table->text('address_line_1')->nullable();
            $table->text('address_line_2')->nullable();
            $table->uuid('locality_id');
            $table->uuid('property_developer_id')->index();
            $table->text('postcode')->nullable();
            $table->decimal('lat', 20, 17);
            $table->decimal('lng', 20, 17);
            $table->text('property_uri');
            $table->text('brochure_uri')->nullable();
            $table->text('layout_uri')->nullable();
            $table->text('site_map_uri')->nullable();
            $table->text('ps_home_image_uri')->nullable();
            $table->text('ps_overview_image_uri')->nullable();
            $table->text('ps_specs_image_uri')->nullable();
            $table->text('ps_pricing_image_uri')->nullable();
            $table->text('ps_floor_plan_image_uri')->nullable();
            $table->text('ps_amenities_image_uri')->nullable();
            $table->text('ps_video_image_uri')->nullable();
            $table->text('ps_brochure_1_image_uri')->nullable();
            $table->text('ps_brochure_2_image_uri')->nullable();
            $table->text('possession')->nullable();
            $table->text('regulatory_approval_title')->nullable();
            $table->text('regulatory_approval_detail')->nullable();
            $table->text('regulatory_approval_qr_image')->nullable();
            $table->text('video_embed_code')->nullable();
            $table->softDeletesDatetime();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE properties ALTER COLUMN title TYPE CITEXT');
        DB::statement('ALTER TABLE properties ALTER COLUMN summary TYPE CITEXT');
        DB::statement('ALTER TABLE properties ALTER COLUMN detail TYPE CITEXT');
        DB::statement('ALTER TABLE properties ALTER COLUMN address_line_1 TYPE CITEXT');
        DB::statement('ALTER TABLE properties ALTER COLUMN address_line_2 TYPE CITEXT');
        DB::statement('ALTER TABLE properties ALTER COLUMN postcode TYPE CITEXT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
