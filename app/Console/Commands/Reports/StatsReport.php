<?php

namespace App\Console\Commands\Reports;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Transformers\Reports\ReportTransformer;
use App\Services\App\Reports\Contracts\ReportBuilder;

class StatsReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:build {period}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build stats report for given period';

    protected $builder;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ReportBuilder $builder)
    {
        parent::__construct();

        $this->builder = $builder;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $period = $this->argument('period');

        if (method_exists($this->builder, $period)) {

            $report = $this->builder->{$period}()->build();

            $stats = $report->getData();

            if (method_exists($this, $period)) {
                $this->output($this->{$period}($stats));
            } else {
                $this->output($this->daily($stats));
            }

        } else {
            $this->error('No such reporting period');
        }
    }

    protected function daily($stats)
    {
        return
            'Ежедневный отчет' . PHP_EOL
            . 'Скачиваний магнита: ' . $stats['magnetDownloads'] . PHP_EOL
            . 'Нажатий на кнопку «Купить»: ' . $stats['tripwireOrders'] . PHP_EOL
            . 'Покупок трипваера: ' . $stats['tripwirePurchases'];
    }

    protected function weekly($stats)
    {
        return
            'Еженедельный отчет' . PHP_EOL
            . 'Скачиваний магнита: ' . $stats['magnetDownloads'] . PHP_EOL
            . 'Нажатий на кнопку «Купить»: ' . $stats['tripwireOrders'] . PHP_EOL
            . 'Покупок трипваера: ' . $stats['tripwirePurchases'] . PHP_EOL
            . 'Отправленных писем: ' . $stats['autorespondersStatistics']['sent'] . PHP_EOL
            . 'Открытых писем: ' . $stats['autorespondersStatistics']['opened'] . '%' . PHP_EOL
            . 'Кликов писем: ' . $stats['autorespondersStatistics']['clicked'] . '%' . PHP_EOL
            . 'Жалоб: ' . $stats['autorespondersStatistics']['complaints'] . '%';
    }

    protected function monthly($stats)
    {
        return
            'Ежемесячный отчет' . PHP_EOL
            . 'Скачиваний магнита: ' . $stats['magnetDownloads'] . PHP_EOL
            . 'Нажатий на кнопку «Купить»: ' . $stats['tripwireOrders'] . PHP_EOL
            . 'Покупок трипваера: ' . $stats['tripwirePurchases'] . PHP_EOL
            . 'Отправленных писем: ' . $stats['autorespondersStatistics']['sent'] . PHP_EOL
            . 'Открытых писем: ' . $stats['autorespondersStatistics']['opened'] . '%' . PHP_EOL
            . 'Кликов писем: ' . $stats['autorespondersStatistics']['clicked'] . '%' . PHP_EOL
            . 'Жалоб: ' . $stats['autorespondersStatistics']['complaints'] . '%';
    }

    protected function output($msg)
    {
        $this->line($msg);
    }
}
