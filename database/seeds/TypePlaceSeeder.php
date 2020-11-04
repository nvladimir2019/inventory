<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typeplace')->insert([
            'id' => 1,
            'name' => 'Typeplace1'
        ]);
    }
}
