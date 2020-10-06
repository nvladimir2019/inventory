<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert([
            [
                'models_id' => 1,
                'typeattrib_id' => 1,
                'values' => '23.5'
            ], [
                'models_id' => 1,
                'typeattrib_id' => 2,
                'values' => '1920 x 1080'
            ], [
                'models_id' => 1,
                'typeattrib_id' => 3,
                'values' => '144 Гц'
            ], [
                'models_id' => 1,
                'typeattrib_id' => 4,
                'values' => 'VA'
            ], [
                'models_id' => 1,
                'typeattrib_id' => 5,
                'values' => '4 мс (GtG)'
            ], [
                'models_id' => 1,
                'typeattrib_id' => 6,
                'values' => 'Стандартная: 250 кд/м², Минимальная: 200 кд/м²'
            ], [
                'models_id' => 1,
                'typeattrib_id' => 7,
                'values' => '3000:1 (стандартная), 1000000:1 (динамическая)'
            ], [
                'models_id' => 1,
                'typeattrib_id' => 8,
                'values' => 'Flicker-Free, Изогнутый экран'
            ]
        ]);
    }
}
