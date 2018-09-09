<?php

namespace App\Services\App\Tests;

use App\Models\Tests\{
    Test,
    TestQuestion,
    TestCondition
};

abstract class TestAbstract
{
    protected static $mappings = [

        '1' => CertificationTest::class

    ];

    abstract public function store($request);

    public static function create($test)
    {
        return new self::$mappings[$test];
    }

    protected function storeBaseInfo($data)
    {
        return Test::create($data);
    }

    protected function storeTestQuestions($questions, $test)
    {
        foreach ($questions as $question) {

            $newQuestion = new TestQuestion();

            $newQuestion->question = $question['question'];

            $newQuestion->sort_order = $question['sort_order'];

            $newQuestion->test()->associate($test);

            $newQuestion->save();
        }
    }

    protected function storeTestConditions($conditions, $test)
    {
        foreach ($conditions as $condition) {

            $newCondition = new TestCondition();

            $newCondition->name = $condition['name'];

            $newCondition->description = $condition['description'];
            
            $newCondition->score = $condition['score'];

            $newCondition->test()->associate($test);

            $newCondition->save();
        }
    }
}
