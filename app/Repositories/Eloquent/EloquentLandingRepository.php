<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\LandingRepository;
use App\Models\Landings\Landing;

class EloquentLandingRepository implements LandingRepository
{

    public function getFewLatest($number)
    {
        return Landing::latest()->take($number)->get();
    }

}
