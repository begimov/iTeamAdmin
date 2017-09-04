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

    ];
    foreach ($categories as $key => $value) {
      DB::table('categories')->insert($value);
    }
  }
}
