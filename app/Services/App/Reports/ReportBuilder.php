<?php

namespace App\Services\App\Reports;

use Carbon\Carbon;
use App\Services\App\Reports\Contracts\ReportBuilder as ReportBuilderInterface;

class ReportBuilder implements ReportBuilderInterface
{
    public $fromDate;

    public $data = [];

    protected $parameters = [];

    public function __construct()
    {
        // GR client with injected Guzzle http client
        // Google Analytics client with injected Guzzle http client
    }

    public function dailyReport()
    {
        $this->setFromDate(Carbon::now()->subDay());

        $this->withMagnetDownloads();

        return $this;
    }

    public function build(): Report
    {
        foreach ($this->parameters as $parameter) {
            $this->data[$parameter] = $this->{$parameter}();
        }

        return new Report($this);
    }

    protected function withMagnetDownloads()
    {
        $this->parameters[] = 'magnetDownloads';
        return $this;
    }

    protected function setFromDate(Carbon $date)
    {
        $this->fromDate = $date;
        return $this;
    }

    protected function magnetDownloads()
    {
        return 10;
    }
}