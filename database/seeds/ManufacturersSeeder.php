<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('manufacturers')->insert([
            [
                'id' => 1,
                'name' => 'TestManufacturers1'
            ], [
                'id' => 2,
                'name' => 'TestManufacturers2'
            ]
        ]);
    }
}
