<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeAttribSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typeattrib')->insert([
            [
                'id' => 1,
                'name' => 'Диагональ',
                'typeinvent_id' => 1
            ], [
                'id' => 2,
                'name' => 'Разрешение',
                'typeinvent_id' => 1
            ], [
                'id' => 3,
                'name' => 'Частота обновления',
                'typeinvent_id' => 1
            ], [
                'id' => 4,
                'name' => 'Тип матрицы',
                'typeinvent_id' => 1
            ], [
                'id' => 5,
                'name' => 'Время реакции матрицы',
                'typeinvent_id' => 1
            ], [
                'id' => 6,
                'name' => 'Яркость дисплея',
                'typeinvent_id' => 1
            ], [
                'id' => 7,
                'name' => 'Контрастность дисплея',
                'typeinvent_id' => 1
            ], [
                'id' => 8,
                'name' => 'Особенности',
                'typeinvent_id' => 1
            ]
        ]);
    }
}
