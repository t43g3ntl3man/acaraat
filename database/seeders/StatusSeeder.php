<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Ready to Move', 'Off Plan'];
        for ($i = 0; $i < sizeof($statuses); $i++) {
            DB::table('statuses')->insert([
                'name' => $statuses[$i]
            ]);
        }
    }
}
