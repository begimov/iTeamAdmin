<?php

namespace App\Services\App\Tests;

abstract class TestAbstract
{
    protected static $mappings = [

        'certification' => CertificationTest::class

    ];

    public static function create($test)
    {
        return new self::$mappings[$test];
    }

    abstract public function store($data);
}
