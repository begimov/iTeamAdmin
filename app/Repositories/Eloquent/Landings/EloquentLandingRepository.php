<?php

namespace App\Repositories\Eloquent\Landings;

use App\Repositories\Contracts\Landings\LandingRepository;
use App\Models\Landings\Landing;

class EloquentLandingRepository implements LandingRepository
{

    public function getFewLatest($number)
    {
        return Landing::latest()->take($number)->get();
    }

}
