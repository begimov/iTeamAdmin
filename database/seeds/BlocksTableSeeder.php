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
                'data' => '{"files":{"img1":""},"text":"","isCard":false,"reversed":false}'
            ],
            [
                'view' => 'paragraph',
                'data' => '{"text":"","isCard":false}'
            ],
            [
                'view' => 'purchase',
                'data' => '{"product":""}'
            ],
            [
                'view' => 'threecards',
                'data' => '{"files":{"img1":"","img2":"","img3":""},"title1":"","text1":"","title2":"","text2":"","title3":"","text3":""}'
            ],
            [
                'view' => 'freemagnet',
                'data' => '{"files":{"doc1":""},"campaignToken":"","title":"","description":"","buttonText":""}'
            ],
            [
                'view' => 'mpstages',
                'data' => '{"stages":""}'
            ],
            [
                'view' => 'videoreviews',
                'data' => '{"video1":{"author":"","id":""},"video2":{"author":"","id":""},"video3":{"author":"","id":""},"video4":{"author":"","id":""}}'
            ],
            [
                'view' => 'title',
                'data' => '{"text":"","subtext":""}'
            ],
            [
                'view' => 'subtitle',
                'data' => '{"text":""}'
            ],
            [
                'view' => 'textreviews',
                'data' => '{"reviews":""}'
            ],
            [
                'view' => 'fbcomments',
                'data' => '{}'
            ],
            [
                'view' => 'freeproduct',
                'data' => '{"form":""}'
            ],
            [
                'view' => 'mppurchase',
                'data' => '{"products":""}'
            ],
            [
                'view' => 'image',
                'data' => '{"files":{"img1":""}}'
            ],
            [
                'view' => 'video',
                'data' => '{"resources":{"video1":""}}'
            ],
      ];
      foreach ($blocks as $key => $value) {
          DB::table('blocks')->insert($value);
      }
    }
}
