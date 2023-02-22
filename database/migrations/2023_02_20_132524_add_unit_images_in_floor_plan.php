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
            $table->json('unit_images')->nullable()->after('videos');
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
            $table->json('unit_images')->nullable()->after('videos');
        });
    }
};
