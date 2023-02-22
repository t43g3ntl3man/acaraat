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
            $table->unsignedBigInteger('property_types_id');
            $table->foreign('property_types_id')->references('id')->on('property_types');
            $table->unsignedBigInteger('projects_id');
            $table->foreign('projects_id')->references('id')->on('projects');
            $table->string('name');
            $table->unsignedBigInteger('bedrooms_id');
            $table->foreign('bedrooms_id')->references('id')->on('bedrooms');
            $table->unsignedBigInteger('bathrooms_id');
            $table->foreign('bathrooms_id')->references('id')->on('bathrooms');
            $table->unsignedBigInteger('sizes_id');
            $table->foreign('sizes_id')->references('id')->on('sizes');
            $table->string('size');
            $table->longText('brief_description');
            $table->string('image');
            $table->json('videos');
            $table->json('site_maps');
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
            $table->unsignedBigInteger('property_types_id');
            $table->foreign('property_types_id')->references('id')->on('property_types');
            $table->unsignedBigInteger('projects_id');
            $table->foreign('projects_id')->references('id')->on('projects');
            $table->string('name');
            $table->unsignedBigInteger('bedrooms_id');
            $table->foreign('bedrooms_id')->references('id')->on('bedrooms');
            $table->unsignedBigInteger('bathrooms_id');
            $table->foreign('bathrooms_id')->references('id')->on('bathrooms');
            $table->unsignedBigInteger('sizes_id');
            $table->foreign('sizes_id')->references('id')->on('sizes');
            $table->string('size');
            $table->longText('brief_description');
            $table->json('images');
            $table->json('videos');
            $table->json('site_maps');
        });
    }
};
