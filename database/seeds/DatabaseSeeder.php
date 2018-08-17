<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BusinessEntitiesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PaymentStatesTableSeeder::class);
        $this->call(PaymentTypesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(BlocksTableSeeder::class);
        $this->call(ResourceTypesTableSeeder::class);
        $this->call(ThemesTableSeeder::class);
    }
}
