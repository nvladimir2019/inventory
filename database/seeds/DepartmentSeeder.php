<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert([
            [
                'id' => 1,
                'namedept' => 'test'
            ],
            [
                'id' => 2,
                'namedept' => 'test2'
            ]
        ]);
    }
}
