<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filial')->insert([
            [
                'id' => 1,
                'name' => 'testFilial',
                'locality' => 'Locality1'
            ],
            [
                'id' => 2,
                'name' => 'testFilial2',
                'locality' => 'Locality2'
            ], [
                'id' => 3,
                'name' => 'testFilial3',
                'locality' => 'Locality3'
            ]
        ]);
    }
}
