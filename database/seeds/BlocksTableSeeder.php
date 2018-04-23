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
                'data' => '{"files":{"img1":""},"text":""}'
            ],
            [
                'view' => 'paragraph',
                'data' => '{"text":""}'
            ],
            [
                'view' => 'purchase',
                'data' => '{"product":""}'
            ],
            [
                'view' => 'threecards',
                'data' => '{"title1":"","text1":"","title2":"","text2":"","title3":"","text3":""}'
            ],
      ];
      foreach ($blocks as $key => $value) {
          DB::table('blocks')->insert($value);
      }
    }
}
