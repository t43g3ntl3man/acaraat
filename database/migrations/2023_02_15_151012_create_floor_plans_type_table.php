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
        Schema::create('floor_plans_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('floor_plans_id');
            $table->foreign('floor_plans_id')->references('id')->on('floor_plans');
            $table->unsignedBigInteger('property_types_id');
            $table->foreign('property_types_id')->references('id')->on('property_types');
            
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
        Schema::dropIfExists('floor_plans_type');
    }
};
