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
            'id' => 1,
            'department_id' => 1,
            'placement_id' => 1,
            'active' => 1,
            'name' => 'Workplace1'
        ]);
    }
}
