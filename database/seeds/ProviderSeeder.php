<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('providers')->insert([
            [
                'id' => 1,
                'name' => 'TestProvider1'
            ], [
                'id' => 2,
                'name' => 'TestProvider2'
            ]
        ]);
    }
}
