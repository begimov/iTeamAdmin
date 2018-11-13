<?php

namespace App\Services\App\Reports\Contracts;

use Carbon\Carbon;
use App\Services\App\Reports\Report;

interface ReportBuilder
{
    public function daily();

    public function weekly();

    public function build(): Report;
}