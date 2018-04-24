<?php

use Illuminate\Database\Seeder;

class PaymentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $paymentTypes = [
          ['name' => 'Youtube video'],
      ];
      foreach ($paymentTypes as $key => $value) {
          DB::table('resource_types')->insert($value);
      }
    }
}
