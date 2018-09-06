<?php

namespace App\Services\App\Tests;

abstract class TestAbstract
{
    protected $mappings = [

        'certification' => CertificationTest::class
        
    ];

    public static function create($test)
    {
        return new $this->mappings[$test];
    }
}
