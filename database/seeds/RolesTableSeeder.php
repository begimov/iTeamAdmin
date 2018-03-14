<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $roles = [
          ['name' => 'admin'],
      ];
      foreach ($roles as $key => $value) {
          DB::table('roles')->insert($value);
      }
    }
}
