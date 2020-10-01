<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('type')->insert([
            [
                'id' => 1,
                'name' => 'Type1'
            ], [
                'id' => 2,
                'name' => 'type2'
            ]
        ]);
    }
}
