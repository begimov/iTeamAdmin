<?php

namespace App\Services\App\Reports;

class Report
{
    public $fromDate;

    public $data = [];

    public function __construct(ReportBuilder $builder)
    {
        $this->fromDate = $builder->fromDate;

        $this->data = $builder->data;
    }
}