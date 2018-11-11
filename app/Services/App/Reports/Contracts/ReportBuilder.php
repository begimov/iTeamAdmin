<?php

namespace App\Services\App\Reports\Contracts;

use App\Services\App\Reports\Report;

interface ReportBuilder
{
    public function dailyReport();

    public function withMagnetDownloads();

    public function build(): Report;
}