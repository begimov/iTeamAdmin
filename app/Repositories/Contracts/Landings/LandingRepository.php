<?php

namespace App\Repositories\Contracts\Landings;

interface LandingRepository
{
    public function getFewLatest($number);
}
