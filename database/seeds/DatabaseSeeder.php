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
//        $this->call(TypePlaceSeeder::class);
//        $this->call(FilialSeeder::class);
//        $this->call(BuildingSeeder::class);
//        $this->call(FloorSeeder::class);
//        $this->call(PlacementSeeder::class);
//        $this->call(DepartmentSeeder::class);
//        $this->call(WorkplaceSeeder::class);
//        $this->call(ProviderSeeder::class);
//        $this->call(ManufacturersSeeder::class);
//        $this->call(TypeSeeder::class);
//        $this->call(ModelSeeder::class);
//        $this->call(StatusSeeder::class);
//        $this->call(TypeAttribSeeder::class);
//        $this->call(AttributesSeeder::class);
        $this->call(RolesSeeder::class);
    }
}
