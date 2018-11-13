<?php

namespace App\Services\App\Reports;

use Carbon\Carbon;
use App\Repositories\Eloquent\Criteria\Where;
use App\Services\Stats\Contracts\IGetResponse;
use App\Repositories\Eloquent\Criteria\WhereGreater;
use App\Repositories\Contracts\Products\OrderRepository;
use App\Services\App\Reports\Contracts\ReportBuilder as ReportBuilderInterface;

class ReportBuilder implements ReportBuilderInterface
{
    public $fromDate;

    public $data = [];

    protected $parameters = [];

    protected $gr;

    protected $orders;

    public function __construct(IGetResponse $gr, OrderRepository $orders)
    {
        $this->gr = $gr;

        $this->orders = $orders;

        // Google Analytics client with injected Guzzle http client
    }

    public function daily()
    {
        $this->setFromDate(Carbon::now()->subDay());

        $this->withMagnetDownloads()
            ->withTripwireOrders()
            ->withTripwirePurchases();

        return $this;
    }

    public function weekly()
    {
        $this->setFromDate(Carbon::now()->subWeek());

        $this->withMagnetDownloads()
            ->withTripwireOrders()
            ->withTripwirePurchases()
            ->withAutorespondersStatistics();

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

    protected function withTripwireOrders()
    {
        $this->parameters[] = 'tripwireOrders';
        return $this;
    }

    protected function withTripwirePurchases()
    {
        $this->parameters[] = 'tripwirePurchases';
        return $this;
    }

    protected function withAutorespondersStatistics()
    {
        $this->parameters[] = 'autorespondersStatistics';
        return $this;
    }

    protected function setFromDate(Carbon $date)
    {
        $this->fromDate = $date;
        return $this;
    }

    protected function magnetDownloads()
    {
        $grData = $this->gr->getCampaignStatisticsListsize(
            config('services.getresponse.book_magnet_campaign'), 
            $this->fromDate
        );

        return array_reduce($grData, function($acc, $e) {
            return $acc + $e->addedSubscribers;
        }, 0);
    }

    protected function tripwireOrders()
    {
        $tripwireOrders = $this->orders->withCriteria([
            new Where('product_id', config('orders.tripwire_product_id')),
            new WhereGreater('created_at', $this->fromDate),
        ])->get();

        return $tripwireOrders->count();
    }

    protected function tripwirePurchases()
    {
        $tripwireOrders = $this->orders->withCriteria([
            new Where('product_id', config('orders.tripwire_product_id')),
            new Where('payment_state_id', config('orders.payed_payment_state_id')),
            new WhereGreater('created_at', $this->fromDate),
        ])->get();

        return $tripwireOrders->count();
    }

    protected function autorespondersStatistics()
    {
        $response = $this->gr->getAutorespondersStatistics($this->fromDate);

        $response = array_pop($response);

        return [
            'sent' => $sent = $response->sent,
            'opened' => round(($response->uniqueOpened / $sent) * 100, 2),
            'clicked' => round(($response->uniqueClicked / $sent) * 100, 2),
            'complaints' => round(($response->complaints / $sent) * 100, 2),
        ];
    }
}