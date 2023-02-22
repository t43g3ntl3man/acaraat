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
        Schema::table('unit_features', function (Blueprint $table) {
            $table->unsignedBigInteger('developers_id')->nullable()->after('id');
            $table->foreign('developers_id')->references('id')->on('developers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unit_features', function (Blueprint $table) {
            $table->unsignedBigInteger('developers_id')->nullable()->after('id');
            $table->foreign('developers_id')->references('id')->on('developers');
        });
    }
};
