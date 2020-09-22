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
            [
                'id' => 1,
                'number' => 1,
                'building_id' => 1
            ],
            [
                'id' => 2,
                'number' => 2,
                'building_id' => 1
            ], [
                'id' => 3,
                'number' => 3,
                'building_id' => 1
            ], [
                'id' => 4,
                'number' => 4,
                'building_id' => 2
            ], [
                'id' => 5,
                'number' => 5,
                'building_id' => 2
            ], [
                'id' => 6,
                'number' => 6,
                'building_id' => 2
            ], [
                'id' => 7,
                'number' => 7,
                'building_id' => 3
            ], [
                'id' => 8,
                'number' => 8,
                'building_id' => 3
            ], [
                'id' => 9,
                'number' => 9,
                'building_id' => 3
            ], [
                'id' => 10,
                'number' => 10,
                'building_id' => 4
            ], [
                'id' => 11,
                'number' => 11,
                'building_id' => 4
            ], [
                'id' => 12,
                'number' => 12,
                'building_id' => 4
            ], [
                'id' => 13,
                'number' => 13,
                'building_id' => 5
            ], [
                'id' => 14,
                'number' => 14,
                'building_id' => 5
            ], [
                'id' => 15,
                'number' => 15,
                'building_id' => 5
            ], [
                'id' => 16,
                'number' => 16,
                'building_id' => 6
            ], [
                'id' => 17,
                'number' => 17,
                'building_id' => 6
            ], [
                'id' => 18,
                'number' => 18,
                'building_id' => 6
            ], [
                'id' => 19,
                'number' => 19,
                'building_id' => 7
            ], [
                'id' => 20,
                'number' => 20,
                'building_id' => 7
            ], [
                'id' => 21,
                'number' => 21,
                'building_id' => 7
            ], [
                'id' => 22,
                'number' => 22,
                'building_id' => 8
            ], [
                'id' => 23,
                'number' => 23,
                'building_id' => 8
            ], [
                'id' => 24,
                'number' => 24,
                'building_id' => 8
            ], [
                'id' => 25,
                'number' => 25,
                'building_id' => 9
            ], [
                'id' => 26,
                'number' => 26,
                'building_id' => 9
            ], [
                'id' => 27,
                'number' => 27,
                'building_id' => 9
            ]
        ]);
    }
}
