<?php

namespace App\Http\Controllers\Webapi\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\Reports\ReportTransformer;
use App\Services\App\Reports\Contracts\ReportBuilder;

class ReportController extends Controller
{
    protected $builder;

    public function __construct(ReportBuilder $builder)
    {
        $this->builder = $builder;
    }
    
    public function show(Request $request, $type)
    {
        if (method_exists($this, $type)) {
            return $this->{$type}();
        }
        return $this->daily();
    }

    protected function daily()
    {
        return fractal(
            $this->builder->dailyReport()->build(), 
            new ReportTransformer()
        )->toArray();
    }

    protected function weekly()
    {
        return fractal(
            $this->builder->weeklyReport()->build(), 
            new ReportTransformer()
        )->toArray();
    }
}
