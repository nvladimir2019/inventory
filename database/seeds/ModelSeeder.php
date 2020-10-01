<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('models')->insert([
            [
                'id' => 1,
                'name' => 'Model1',
                'manufacturers_id' => 1,
                'typeinvent_id' => 1
            ], [
                'id' => 2,
                'name' => 'Model2',
                'manufacturers_id' => 2,
                'typeinvent_id' => 2
            ]
        ]);
    }
}
