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
      ];
      foreach ($blocks as $key => $value) {
          DB::table('blocks')->insert($value);
      }
    }
}
