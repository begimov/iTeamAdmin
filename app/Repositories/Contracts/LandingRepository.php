<?php

namespace App\Repositories\Contracts;

interface LandingRepository
{
    public function getFewLatest($number);
}
