<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
