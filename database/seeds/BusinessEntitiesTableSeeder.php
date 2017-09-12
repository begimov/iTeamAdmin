<?php

use Illuminate\Database\Seeder;

class BusinessEntitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $businessEntities = [
          ['name' => 'ООО'],
          ['name' => 'ИП'],
          ['name' => 'ЗАО'],
          ['name' => 'ОАО'],
          ['name' => 'УП'],
      ];
      foreach ($businessEntities as $key => $value) {
          DB::table('business_entities')->insert($value);
      }
    }
}
