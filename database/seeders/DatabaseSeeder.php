<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('roles')->insert([
            ['role' => 'seller'],
            ['role' => 'buyer'],
        ]);

        DB::table('software_types')->insert([
            ['type' => 'desktop'],
            ['type' => 'website'],
            ['type' => 'mobile'],
        ]);


        DB::table('statuses')->insert([
            ['status' => 'waiting for payment'],
            ['status' => 'bought'],
        ]);
    }
}
