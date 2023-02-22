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
        Schema::table('projects', function (Blueprint $table) {
            $table->json('main_features')->nullable()->after('brouchers');
            $table->json('business_com')->nullable()->after('brouchers');
            $table->json('community_feat')->nullable()->after('brouchers');
            $table->json('healthcare')->nullable()->after('brouchers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->json('main_features')->nullable()->after('brouchers');
            $table->json('business_com')->nullable()->after('brouchers');
            $table->json('community_feat')->nullable()->after('brouchers');
            $table->json('healthcare')->nullable()->after('brouchers');
        });
    }
};
