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
          ['name' => 'Единый кошелек'],
          ['name' => 'Счет на Юр. лицо'],
      ];
      foreach ($paymentTypes as $key => $value) {
          DB::table('payment_types')->insert($value);
      }
    }
}
