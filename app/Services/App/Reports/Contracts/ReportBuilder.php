<?php

namespace App\Services\App\Reports\Contracts;

use Carbon\Carbon;
use App\Services\App\Reports\Report;

interface ReportBuilder
{
    public function dailyReport();

    public function build(): Report;
}