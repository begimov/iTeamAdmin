<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;

class TestCertificate extends Model
{
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
