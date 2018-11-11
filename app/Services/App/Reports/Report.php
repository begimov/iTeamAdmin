<?php

namespace App\Services\App\Reports;

class Report
{
    protected $period;

    protected $parameters = [];

    protected $data = [];

    public function __construct(ReportBuilder $builder)
    {
        $this->period = $builder->period;

        $this->parameters = $builder->parameters;

        $this->data = $builder->data;
    }
}