<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
use Carbon\Carbon;
use Hash;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_GB');
        for ($i = 0; $i < 5; $i++) {
            $name_fake = $faker->firstName;
            $last_name_fake = $faker->lastName;
            DB::table('developers')->insert([
                'first_name' => $name_fake,
                'last_name' => $last_name_fake,
                'email' => strtolower($name_fake).'@gmail.com',
                'number' => $faker->phoneNumber,
                'password' => Hash::make('password'),
                'company_name' => strtolower($name_fake).' Company',
                'company_phone' => $faker->phoneNumber,
                'company_address' => $faker->address,
                'company_website' => 'www.'.strtolower($name_fake).'.com',
                'trade_license' => strtolower($name_fake).str(rand(111, 999)),
                'trade_license_expiry' => Carbon::now()->addYears(rand(1, 5))->format('Y-m-d H:i:s'),
                'trade_license_document' => 'null',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
