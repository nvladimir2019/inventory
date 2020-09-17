<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('placement')->insert([
            'id' => 1,
            'placement' => 'Placement1',
            'filial_id' => 1,
            'typeplace_id' => 1
        ]);
    }
}
