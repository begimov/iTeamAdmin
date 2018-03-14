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
          ['name' => 'Яндекс.Касса'],
          ['name' => 'Единый кошелек'],
      ];
      foreach ($paymentTypes as $key => $value) {
          DB::table('payment_types')->insert($value);
      }
    }
}
