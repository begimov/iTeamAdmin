<?php

use Illuminate\Database\Seeder;

class PaymentStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentStates = [
            ['name' => 'Не оплачен'],
            ['name' => 'Оплачен'],
        ];
        foreach ($paymentStates as $key => $value) {
            DB::table('payment_states')->insert($value);
        }
    }
}
