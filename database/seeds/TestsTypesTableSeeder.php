<?php

use Illuminate\Database\Seeder;

class TestsTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $testTypes = [
          ['name' => 'Сертификационный'],
      ];
      foreach ($testTypes as $key => $value) {
          DB::table('test_types')->insert($value);
      }
    }
}
