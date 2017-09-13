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
          ['name' => 'Я.Касса'],
          ['name' => 'Карта'],
          ['name' => 'Сбербанк'],
          ['name' => 'Перевод'],
          ['name' => 'Счет'],
      ];
      foreach ($paymentTypes as $key => $value) {
          DB::table('payment_types')->insert($value);
      }
    }
}
