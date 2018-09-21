<?php

namespace App\Services\App\Tests;

class CertificationTest extends TestAbstract
{
    public function store($request)
    {
        $test = $this->storeBaseInfo($request->only($this->getBaseFields()));

        $questions = $request->questions;

        $conditions = $request->conditions;

        $this->storeTestQuestions($questions, $test);

        $this->storeTestConditions($conditions, $test);
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
