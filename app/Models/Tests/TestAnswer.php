<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function testQuestion()
    {
        return $this->belongsTo(TestQuestion::class);
    }
}
