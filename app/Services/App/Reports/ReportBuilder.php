<?php

namespace App\Services\App\Reports;

use Carbon\Carbon;
use App\Services\App\Reports\Contracts\ReportBuilder as ReportBuilderInterface;

class ReportBuilder implements ReportBuilderInterface
{
    protected $period;

    protected $parameters = [];

    protected $data = [];

    public function __construct()
    {
        // GR client with injected Guzzle http client
        // Google Analytics client with injected Guzzle http client
    }

    public function dailyReport()
    {
        $this->setDatePeriod(1);

        $this->withMagnetDownloads();

        return $this;
    }

    public function withMagnetDownloads()
    {
        $this->parameters[] = 'magnetDownloads';
        return $this;
    }

    public function build(): Report
    {
        foreach ($this->parameters as $parameter) {
            $this->data[$parameter] = $this->{$parameter}();
        }

        return new Report($this);
    }

    protected function setDatePeriod(integer $days)
    {
        $this->period = $days;
        return $this;
    }

    protected function magnetDownloads()
    {
        return 10;
    }
}