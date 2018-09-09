<?php

namespace App\Services\App\Tests;

use App\Models\Tests\Test;

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
        dd($questions, $test);
    }

    protected function storeTestConditions($conditions, $test)
    {
        //
    }
}
