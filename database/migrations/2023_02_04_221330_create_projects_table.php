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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('developers_id');
            $table->foreign('developers_id')->references('id')->on('developers');
            $table->string('name');
            $table->unsignedBigInteger('statuses_id');
            $table->foreign('statuses_id')->references('id')->on('statuses');
            $table->unsignedBigInteger('modes_id')->nullable();
            $table->foreign('modes_id')->references('id')->on('modes');
            $table->string('completion_date');
            $table->string('permit_number');
            $table->string('deed');
            $table->string('escrow');
            $table->unsignedBigInteger('cities_id')->nullable();
            $table->foreign('cities_id')->references('id')->on('cities');
            $table->json('location');
            $table->longText('short_desctiption')->nullable();
            $table->longText('brief_desctiption')->nullable();
            $table->integer('no_of_units');
            $table->integer('no_of_floors');
            $table->json('images')->nullable();
            $table->json('videos')->nullable();
            $table->json('brouchers')->nullable();
            $table->string('cover')->nullable();
            $table->integer('minimum_price');
            $table->integer('maximum_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
