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
            'id' => 1,
            'name' => 'testFilial',
            'locality' => 'Locality1',
            'street' => 'Street1',
            'building' => 1
        ]);
    }
}
