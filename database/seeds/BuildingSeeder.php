<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('building')->insert([
            'id' => 1,
            'name' => 'Buiding1',
            'street' => 'street',
            'number' => 1,
            'filial_id' => 1
        ]);
    }
}
