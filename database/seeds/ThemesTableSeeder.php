<?php

use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $themes = [
        [
          'name' => 'Стратегия',
          'slug' => 'strategiya',
        ],
        [
          'name' => 'Бизнес-процессы',
          'slug' => 'biznes-processy',
        ],
        [
          'name' => 'Организационная структура',
          'slug' => 'organizacionnaya-struktura',
        ],
        [
          'name' => 'Планирование',
          'slug' => 'planirovanie',
        ],
        [
          'name' => 'Целевое управление',
          'slug' => 'celevoe-upravlenie',
        ],
        [
          'name' => 'Сбалансированная система показателей',
          'slug' => 'sbalansirovannaya-sistema-pokazateley',
        ],
        [
          'name' => 'Корпоративная культура',
          'slug' => 'korporativnaya-kultura',
        ],
        [
          'name' => 'Мотивация сотрудников',
          'slug' => 'motivaciya-sotrudnikov',
        ],
        [
          'name' => 'Управление финансами',
          'slug' => 'upravlenie-finansami',
        ],
        [
          'name' => 'Маркетинг и продажи',
          'slug' => 'marketing-i-prodazhi',
        ],
        [
          'name' => 'Обучение руководителей',
          'slug' => 'obuchenie-rukovoditeley',
        ],
        [
          'name' => 'Управление изменениями',
          'slug' => 'upravlenie-izmeneniyami',
        ],
        [
          'name' => 'Управление качеством',
          'slug' => 'upravlenie-kachestvom',
        ],
        // ['parent_id' => 1, 'name' => '', 'slug' => ''],
      ];
      foreach ($themes as $key => $value) {
        DB::table('themes')->insert($value);
      }
    }
}
