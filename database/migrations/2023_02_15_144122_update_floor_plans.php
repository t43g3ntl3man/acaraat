<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('floor_plans', function (Blueprint $table) {
            $table->unsignedBigInteger('bedrooms_id')->nullable()->change();
            $table->unsignedBigInteger('property_types_id')->nullable()->change();
            $table->unsignedBigInteger('bathrooms_id')->nullable()->change();
            $table->unsignedBigInteger('sizes_id')->nullable()->change();
            $table->string('size')->nullable()->change();
            $table->longText('brief_description')->nullable()->change();
            $table->json('images')->nullable()->change();
            $table->json('videos')->nullable()->change();
            $table->json('site_maps')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('floor_plans', function (Blueprint $table) {
            $table->unsignedBigInteger('bedrooms_id')->nullable()->change();
            $table->unsignedBigInteger('property_types_id')->nullable()->change();
            $table->unsignedBigInteger('bathrooms_id')->nullable()->change();
            $table->unsignedBigInteger('sizes_id')->nullable()->change();
            $table->string('size')->nullable()->change();
            $table->longText('brief_description')->nullable()->change();
            $table->json('images')->nullable()->change();
            $table->json('videos')->nullable()->change();
            $table->json('site_maps')->nullable()->change();
        });
    }
};
