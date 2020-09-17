<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('floor')->insert([
            'id' => 1,
            'number' => 1,
            'building_id' => 1
        ]);
    }
}
