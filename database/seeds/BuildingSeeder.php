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
            [
                'id' => 1,
                'name' => 'Buiding1',
                'street' => 'street',
                'number' => 1,
                'filial_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Buiding2',
                'street' => 'street2',
                'number' => 2,
                'filial_id' => 1
            ], [
                'id' => 3,
                'name' => 'Buiding3',
                'street' => 'street3',
                'number' => 3,
                'filial_id' => 1
            ], [
                'id' => 4,
                'name' => 'Buiding4',
                'street' => 'street4',
                'number' => 4,
                'filial_id' => 2
            ], [
                'id' => 5,
                'name' => 'Buiding5',
                'street' => 'street5',
                'number' => 5,
                'filial_id' => 2
            ], [
                'id' => 6,
                'name' => 'Buiding6',
                'street' => 'street6',
                'number' => 6,
                'filial_id' => 2
            ], [
                'id' => 7,
                'name' => 'Buiding7',
                'street' => 'street7',
                'number' => 7,
                'filial_id' => 3
            ], [
                'id' => 8,
                'name' => 'Buiding8',
                'street' => 'street8',
                'number' => 8,
                'filial_id' => 3
            ], [
                'id' => 9,
                'name' => 'Buiding9',
                'street' => 'street9',
                'number' => 8,
                'filial_id' => 3
            ]
        ]);
    }
}
