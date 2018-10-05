<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [
        [
          'name' => 'Мастер-классы',
          'slug' => 'master-klassy',
        ],
        [
          'name' => 'Мастер-проекты',
          'slug' => 'master-proekty',
        ],
        [
          'name' => 'Лендинги',
          'slug' => 'lendingi',
        ],
        [
          'name' => 'Комплекты',
          'slug' => 'komplekty',
        ],
        // ['parent_id' => 1, 'name' => '', 'slug' => ''],
      ];
      foreach ($categories as $key => $value) {
        DB::table('categories')->insert($value);
      }
    }
}
