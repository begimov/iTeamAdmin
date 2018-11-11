<?php

namespace App\Services\App\Reports;

class Report
{
    protected $fromDate;

    protected $data = [];

    public function __construct(ReportBuilder $builder)
    {
        $this->fromDate = $builder->fromDate;

        $this->data = $builder->data;
    }
}