<?php

namespace App\Transformers\Reports;

use App\Services\App\Reports\Report;

class ReportTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = [];

    public function transform(Report $report)
    {
        return [
            'fromDate' => $report->fromDate,
            'data' => $report->data,
        ];
    }
}
