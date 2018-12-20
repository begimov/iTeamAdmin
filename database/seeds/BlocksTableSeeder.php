<?php

use Illuminate\Database\Seeder;

class BlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $blocks = [
            [
                'view' => 'imgparagraph',
                'data' => '{"files":{"img1":""},"text":"","isCard":false,"reversed":false}',
                'name' => 'Изображение и текст'
            ],
            [
                'view' => 'paragraph',
                'data' => '{"text":"","isCard":false}',
                'name' => 'Блок текста'
            ],
            [
                'view' => 'purchase',
                'data' => '{"product":""}',
                'name' => 'Модуль покупки',
                'description' => 'По одной цене'
            ],
            [
                'view' => 'threecards',
                'data' => '{"files":{"img1":"","img2":"","img3":""},"title1":"","text1":"","title2":"","text2":"","title3":"","text3":""}',
                'name' => 'Три карточки',
                'description' => 'С изображениями и текстом'
            ],
            [
                'view' => 'freemagnet',
                'data' => '{"files":{"doc1":""},"campaignToken":"","title":"","description":"","buttonText":""}',
                'name' => 'GR форма регистрации',
                'description' => 'Для регистрации на МК или скачивания файла'
            ],
            [
                'view' => 'mpstages',
                'data' => '{"stages":""}',
                'name' => 'Этапы МП'
            ],
            [
                'view' => 'videoreviews',
                'data' => '{"video1":{"author":"","id":""},"video2":{"author":"","id":""},"video3":{"author":"","id":""},"video4":{"author":"","id":""}}',
                'name' => '4 видеоотзыва',
                'description' => 'На каждой странице есть по-умолчанию'
            ],
            [
                'view' => 'title',
                'data' => '{"text":"","subtext":"","comment":""}',
                'name' => 'Главный заголовок',
                'description' => 'С фоновым изображением, подзаголовком и акцентным лейблом'
            ],
            [
                'view' => 'subtitle',
                'data' => '{"text":""}',
                'name' => 'Подзаголовок'
            ],
            [
                'view' => 'textreviews',
                'data' => '{"reviews":""}',
                'name' => 'Текстовые отзывы'
            ],
            [
                'view' => 'fbcomments',
                'data' => '{}',
                'name' => 'Facebook комментарии',
                'description' => 'На каждой странице есть по-умолчанию'
            ],
            [
                'view' => 'freeproduct',
                'data' => '{"form":""}',
                'name' => 'GR форма доступа',
                'description' => 'Для доступа к материалам бесплатного продукта'
            ],
            [
                'view' => 'mppurchase',
                'data' => '{"products":""}',
                'name' => 'Модуль покупки МП',
                'description' => 'Несколько вариантов пакетов и цен'
            ],
            [
                'view' => 'image',
                'data' => '{"files":{"img1":""}}',
                'name' => 'Изображение'
            ],
            [
                'view' => 'video',
                'data' => '{"resources":{"video1":""}}',
                'name' => 'YouTube видео'
            ],
            [
                'view' => 'file',
                'data' => '{"files":{"file1":""}}',
                'name' => 'Кнопка на скачивание файла'
            ],
            [
                'view' => 'imgpurchase',
                'data' => '{"files":{"img1":""},"product":""}',
                'name' => 'Изображение и модуль покупки'
            ],
            [
                'view' => 'html',
                'data' => '{"html":""}',
                'name' => 'Блок с HTML, Bootstrap 4',
                'description' => 'Никаких inline css стилей или скриптов'
            ],
      ];
      foreach ($blocks as $key => $value) {
          DB::table('blocks')->insert($value);
      }
    }
}
