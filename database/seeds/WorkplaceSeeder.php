<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkplaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workplace')->insert([
            [
                'id' => 1,
                'department_id' => 1,
                'placement_id' => 1,
                'active' => 1,
                'name' => 'Workplace1'
            ], [
                'id' => 2,
                'department_id' => 2,
                'placement_id' => 1,
                'active' => 1,
                'name' => 'Workplace2'
            ], [
                'id' => 3,
                'department_id' => 1,
                'placement_id' => 2,
                'active' => 1,
                'name' => 'Workplace3'
            ], [
                'id' => 4,
                'department_id' => 2,
                'placement_id' => 2,
                'active' => 1,
                'name' => 'Workplace4'
            ], [
                'id' => 5,
                'department_id' => 1,
                'placement_id' => 3,
                'active' => 1,
                'name' => 'Workplace5'
            ], [
                'id' => 6,
                'department_id' => 2,
                'placement_id' => 3,
                'active' => 1,
                'name' => 'Workplace6'
            ], [
                'id' => 7,
                'department_id' => 1,
                'placement_id' => 4,
                'active' => 1,
                'name' => 'Workplace7'
            ], [
                'id' => 8,
                'department_id' => 2,
                'placement_id' => 4,
                'active' => 1,
                'name' => 'Workplace8'
            ], [
                'id' => 9,
                'department_id' => 1,
                'placement_id' => 5,
                'active' => 1,
                'name' => 'Workplace9'
            ], [
                'id' => 10,
                'department_id' => 2,
                'placement_id' => 5,
                'active' => 1,
                'name' => 'Workplace10'
            ], [
                'id' => 11,
                'department_id' => 1,
                'placement_id' => 6,
                'active' => 1,
                'name' => 'Workplace11'
            ], [
                'id' => 12,
                'department_id' => 2,
                'placement_id' => 6,
                'active' => 1,
                'name' => 'Workplace12'
            ], [
                'id' => 13,
                'department_id' => 1,
                'placement_id' => 7,
                'active' => 1,
                'name' => 'Workplace13'
            ], [
                'id' => 14,
                'department_id' => 2,
                'placement_id' => 7,
                'active' => 1,
                'name' => 'Workplace14'
            ], [
                'id' => 15,
                'department_id' => 1,
                'placement_id' => 8,
                'active' => 1,
                'name' => 'Workplace15'
            ], [
                'id' => 16,
                'department_id' => 2,
                'placement_id' => 8,
                'active' => 1,
                'name' => 'Workplace16'
            ], [
                'id' => 17,
                'department_id' => 1,
                'placement_id' => 9,
                'active' => 1,
                'name' => 'Workplace17'
            ], [
                'id' => 18,
                'department_id' => 2,
                'placement_id' => 9,
                'active' => 1,
                'name' => 'Workplace18'
            ], [
                'id' => 19,
                'department_id' => 1,
                'placement_id' => 10,
                'active' => 1,
                'name' => 'Workplace19'
            ], [
                'id' => 20,
                'department_id' => 2,
                'placement_id' => 10,
                'active' => 1,
                'name' => 'Workplace20'
            ], [
                'id' => 21,
                'department_id' => 1,
                'placement_id' => 11,
                'active' => 1,
                'name' => 'Workplace21'
            ], [
                'id' => 22,
                'department_id' => 2,
                'placement_id' => 11,
                'active' => 1,
                'name' => 'Workplace22'
            ], [
                'id' => 23,
                'department_id' => 1,
                'placement_id' => 12,
                'active' => 1,
                'name' => 'Workplace23'
            ], [
                'id' => 24,
                'department_id' => 2,
                'placement_id' => 12,
                'active' => 1,
                'name' => 'Workplace24'
            ], [
                'id' => 25,
                'department_id' => 1,
                'placement_id' => 13,
                'active' => 1,
                'name' => 'Workplace25'
            ], [
                'id' => 26,
                'department_id' => 2,
                'placement_id' => 13,
                'active' => 1,
                'name' => 'Workplace26'
            ], [
                'id' => 27,
                'department_id' => 1,
                'placement_id' => 14,
                'active' => 1,
                'name' => 'Workplace27'
            ], [
                'id' => 28,
                'department_id' => 2,
                'placement_id' => 14,
                'active' => 1,
                'name' => 'Workplace28'
            ], [
                'id' => 29,
                'department_id' => 1,
                'placement_id' => 15,
                'active' => 1,
                'name' => 'Workplace29'
            ], [
                'id' => 30,
                'department_id' => 2,
                'placement_id' => 15,
                'active' => 1,
                'name' => 'Workplace30'
            ], [
                'id' => 31,
                'department_id' => 1,
                'placement_id' => 16,
                'active' => 1,
                'name' => 'Workplace31'
            ], [
                'id' => 32,
                'department_id' => 2,
                'placement_id' => 16,
                'active' => 1,
                'name' => 'Workplace32'
            ], [
                'id' => 33,
                'department_id' => 1,
                'placement_id' => 17,
                'active' => 1,
                'name' => 'Workplace33'
            ], [
                'id' => 34,
                'department_id' => 2,
                'placement_id' => 17,
                'active' => 1,
                'name' => 'Workplace34'
            ], [
                'id' => 35,
                'department_id' => 1,
                'placement_id' => 18,
                'active' => 1,
                'name' => 'Workplace35'
            ], [
                'id' => 36,
                'department_id' => 2,
                'placement_id' => 18,
                'active' => 1,
                'name' => 'Workplace36'
            ], [
                'id' => 37,
                'department_id' => 1,
                'placement_id' => 19,
                'active' => 1,
                'name' => 'Workplace37'
            ], [
                'id' => 38,
                'department_id' => 2,
                'placement_id' => 19,
                'active' => 1,
                'name' => 'Workplace38'
            ], [
                'id' => 39,
                'department_id' => 1,
                'placement_id' => 20,
                'active' => 1,
                'name' => 'Workplace39'
            ], [
                'id' => 40,
                'department_id' => 2,
                'placement_id' => 20,
                'active' => 1,
                'name' => 'Workplace40'
            ], [
                'id' => 41,
                'department_id' => 1,
                'placement_id' => 21,
                'active' => 1,
                'name' => 'Workplace41'
            ], [
                'id' => 42,
                'department_id' => 2,
                'placement_id' => 21,
                'active' => 1,
                'name' => 'Workplace42'
            ], [
                'id' => 43,
                'department_id' => 1,
                'placement_id' => 22,
                'active' => 1,
                'name' => 'Workplace43'
            ], [
                'id' => 44,
                'department_id' => 2,
                'placement_id' => 22,
                'active' => 1,
                'name' => 'Workplace44'
            ], [
                'id' => 45,
                'department_id' => 1,
                'placement_id' => 23,
                'active' => 1,
                'name' => 'Workplace45'
            ], [
                'id' => 46,
                'department_id' => 2,
                'placement_id' => 23,
                'active' => 1,
                'name' => 'Workplace46'
            ], [
                'id' => 47,
                'department_id' => 1,
                'placement_id' => 24,
                'active' => 1,
                'name' => 'Workplace47'
            ], [
                'id' => 48,
                'department_id' => 2,
                'placement_id' => 24,
                'active' => 1,
                'name' => 'Workplace48'
            ], [
                'id' => 49,
                'department_id' => 1,
                'placement_id' => 25,
                'active' => 1,
                'name' => 'Workplace49'
            ], [
                'id' => 50,
                'department_id' => 2,
                'placement_id' => 25,
                'active' => 1,
                'name' => 'Workplace50'
            ], [
                'id' => 51,
                'department_id' => 1,
                'placement_id' => 26,
                'active' => 1,
                'name' => 'Workplace51'
            ], [
                'id' => 52,
                'department_id' => 2,
                'placement_id' => 26,
                'active' => 1,
                'name' => 'Workplace52'
            ], [
                'id' => 53,
                'department_id' => 1,
                'placement_id' => 27,
                'active' => 1,
                'name' => 'Workplace53'
            ], [
                'id' => 54,
                'department_id' => 2,
                'placement_id' => 27,
                'active' => 1,
                'name' => 'Workplace54'
            ], [
                'id' => 55,
                'department_id' => 1,
                'placement_id' => 28,
                'active' => 1,
                'name' => 'Workplace55'
            ], [
                'id' => 56,
                'department_id' => 2,
                'placement_id' => 28,
                'active' => 1,
                'name' => 'Workplace56'
            ], [
                'id' => 57,
                'department_id' => 1,
                'placement_id' => 29,
                'active' => 1,
                'name' => 'Workplace57'
            ], [
                'id' => 58,
                'department_id' => 2,
                'placement_id' => 29,
                'active' => 1,
                'name' => 'Workplace58'
            ], [
                'id' => 59,
                'department_id' => 1,
                'placement_id' => 30,
                'active' => 1,
                'name' => 'Workplace59'
            ], [
                'id' => 60,
                'department_id' => 2,
                'placement_id' => 30,
                'active' => 1,
                'name' => 'Workplace60'
            ], [
                'id' => 61,
                'department_id' => 1,
                'placement_id' => 31,
                'active' => 1,
                'name' => 'Workplace61'
            ], [
                'id' => 62,
                'department_id' => 2,
                'placement_id' => 31,
                'active' => 1,
                'name' => 'Workplace62'
            ], [
                'id' => 63,
                'department_id' => 1,
                'placement_id' => 32,
                'active' => 1,
                'name' => 'Workplace63'
            ], [
                'id' => 64,
                'department_id' => 2,
                'placement_id' => 32,
                'active' => 1,
                'name' => 'Workplace64'
            ], [
                'id' => 65,
                'department_id' => 1,
                'placement_id' => 33,
                'active' => 1,
                'name' => 'Workplace65'
            ], [
                'id' => 66,
                'department_id' => 2,
                'placement_id' => 33,
                'active' => 1,
                'name' => 'Workplace66'
            ], [
                'id' => 67,
                'department_id' => 1,
                'placement_id' => 34,
                'active' => 1,
                'name' => 'Workplace67'
            ], [
                'id' => 68,
                'department_id' => 2,
                'placement_id' => 34,
                'active' => 1,
                'name' => 'Workplace68'
            ], [
                'id' => 69,
                'department_id' => 1,
                'placement_id' => 35,
                'active' => 1,
                'name' => 'Workplace69'
            ], [
                'id' => 70,
                'department_id' => 2,
                'placement_id' => 35,
                'active' => 1,
                'name' => 'Workplace70'
            ], [
                'id' => 71,
                'department_id' => 1,
                'placement_id' => 36,
                'active' => 1,
                'name' => 'Workplace71'
            ], [
                'id' => 72,
                'department_id' => 2,
                'placement_id' => 36,
                'active' => 1,
                'name' => 'Workplace72'
            ], [
                'id' => 73,
                'department_id' => 1,
                'placement_id' => 37,
                'active' => 1,
                'name' => 'Workplace73'
            ], [
                'id' => 74,
                'department_id' => 2,
                'placement_id' => 37,
                'active' => 1,
                'name' => 'Workplace74'
            ], [
                'id' => 75,
                'department_id' => 1,
                'placement_id' => 38,
                'active' => 1,
                'name' => 'Workplace75'
            ], [
                'id' => 76,
                'department_id' => 2,
                'placement_id' => 38,
                'active' => 1,
                'name' => 'Workplace76'
            ], [
                'id' => 77,
                'department_id' => 1,
                'placement_id' => 39,
                'active' => 1,
                'name' => 'Workplace77'
            ], [
                'id' => 78,
                'department_id' => 2,
                'placement_id' => 39,
                'active' => 1,
                'name' => 'Workplace78'
            ], [
                'id' => 79,
                'department_id' => 1,
                'placement_id' => 40,
                'active' => 1,
                'name' => 'Workplace79'
            ], [
                'id' => 80,
                'department_id' => 2,
                'placement_id' => 40,
                'active' => 1,
                'name' => 'Workplace80'
            ], [
                'id' => 81,
                'department_id' => 1,
                'placement_id' => 41,
                'active' => 1,
                'name' => 'Workplace81'
            ], [
                'id' => 82,
                'department_id' => 2,
                'placement_id' => 41,
                'active' => 1,
                'name' => 'Workplace82'
            ], [
                'id' => 83,
                'department_id' => 1,
                'placement_id' => 42,
                'active' => 1,
                'name' => 'Workplace83'
            ], [
                'id' => 84,
                'department_id' => 2,
                'placement_id' => 42,
                'active' => 1,
                'name' => 'Workplace84'
            ], [
                'id' => 85,
                'department_id' => 1,
                'placement_id' => 43,
                'active' => 1,
                'name' => 'Workplace85'
            ], [
                'id' => 86,
                'department_id' => 2,
                'placement_id' => 43,
                'active' => 1,
                'name' => 'Workplace86'
            ], [
                'id' => 87,
                'department_id' => 1,
                'placement_id' => 44,
                'active' => 1,
                'name' => 'Workplace87'
            ], [
                'id' => 88,
                'department_id' => 2,
                'placement_id' => 44,
                'active' => 1,
                'name' => 'Workplace88'
            ], [
                'id' => 89,
                'department_id' => 1,
                'placement_id' => 45,
                'active' => 1,
                'name' => 'Workplace89'
            ], [
                'id' => 90,
                'department_id' => 2,
                'placement_id' => 45,
                'active' => 1,
                'name' => 'Workplace90'
            ], [
                'id' => 91,
                'department_id' => 1,
                'placement_id' => 46,
                'active' => 1,
                'name' => 'Workplace91'
            ], [
                'id' => 92,
                'department_id' => 2,
                'placement_id' => 46,
                'active' => 1,
                'name' => 'Workplace92'
            ], [
                'id' => 93,
                'department_id' => 1,
                'placement_id' => 47,
                'active' => 1,
                'name' => 'Workplace93'
            ], [
                'id' => 94,
                'department_id' => 2,
                'placement_id' => 47,
                'active' => 1,
                'name' => 'Workplace94'
            ], [
                'id' => 95,
                'department_id' => 1,
                'placement_id' => 48,
                'active' => 1,
                'name' => 'Workplace95'
            ], [
                'id' => 96,
                'department_id' => 2,
                'placement_id' => 48,
                'active' => 1,
                'name' => 'Workplace96'
            ], [
                'id' => 97,
                'department_id' => 1,
                'placement_id' => 49,
                'active' => 1,
                'name' => 'Workplace97'
            ], [
                'id' => 98,
                'department_id' => 2,
                'placement_id' => 49,
                'active' => 1,
                'name' => 'Workplace98'
            ], [
                'id' => 99,
                'department_id' => 1,
                'placement_id' => 50,
                'active' => 1,
                'name' => 'Workplace99'
            ], [
                'id' => 100,
                'department_id' => 2,
                'placement_id' => 50,
                'active' => 1,
                'name' => 'Workplace100'
            ], [
                'id' => 101,
                'department_id' => 1,
                'placement_id' => 51,
                'active' => 1,
                'name' => 'Workplace101'
            ], [
                'id' => 102,
                'department_id' => 2,
                'placement_id' => 51,
                'active' => 1,
                'name' => 'Workplace102'
            ], [
                'id' => 103,
                'department_id' => 1,
                'placement_id' => 52,
                'active' => 1,
                'name' => 'Workplace103'
            ], [
                'id' => 104,
                'department_id' => 2,
                'placement_id' => 52,
                'active' => 1,
                'name' => 'Workplace104'
            ], [
                'id' => 105,
                'department_id' => 1,
                'placement_id' => 53,
                'active' => 1,
                'name' => 'Workplace105'
            ], [
                'id' => 106,
                'department_id' => 2,
                'placement_id' => 53,
                'active' => 1,
                'name' => 'Workplace106'
            ], [
                'id' => 107,
                'department_id' => 1,
                'placement_id' => 54,
                'active' => 1,
                'name' => 'Workplace107'
            ], [
                'id' => 108,
                'department_id' => 2,
                'placement_id' => 54,
                'active' => 1,
                'name' => 'Workplace108'
            ]
        ]);
    }
}
