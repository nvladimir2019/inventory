<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypePlaceSeeder::class);
        $this->call(FilialSeeder::class);
        $this->call(PlacementSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(WorkplaceSeeder::class);
    }
}
