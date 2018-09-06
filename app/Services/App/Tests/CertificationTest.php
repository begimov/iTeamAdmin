<?php

namespace App\Services\App\Tests;

class CertificationTest extends TestAbstract
{
    public function store($request)
    {
        return $this->storeBaseInfo($request->only($this->getBaseFields()));
    }
    
    protected function getBaseFields()
    {
        return [
            'name',
            'description',
            'test_type_id',
        ];
    }
}
