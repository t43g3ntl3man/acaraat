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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit_number');
            $table->unsignedBigInteger('unit_statuses_id');
            $table->foreign('unit_statuses_id')->references('id')->on('unit_statuses');
            $table->integer('floor');
            $table->integer('price');
            $table->longText('extra_feature_description')->nullable();
            $table->unsignedBigInteger('unit_amenities_id')->nullable();
            $table->foreign('unit_amenities_id')->references('id')->on('unit_amenities');
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
        Schema::dropIfExists('units');
    }
};
