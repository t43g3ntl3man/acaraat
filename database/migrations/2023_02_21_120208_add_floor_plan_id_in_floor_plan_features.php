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
        Schema::table('floor_plan_features', function (Blueprint $table) {
            $table->unsignedBigInteger('floor_plans_id')->after('features_id');
            $table->foreign('floor_plans_id')->references('id')->on('floor_plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('floor_plan_features', function (Blueprint $table) {
            $table->unsignedBigInteger('floor_plans_id')->after('features_id');
            $table->foreign('floor_plans_id')->references('id')->on('floor_plans');
        });
    }
};
