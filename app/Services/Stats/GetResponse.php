<?php

namespace App\Services\Stats;

use Carbon\Carbon;

use App\Services\Stats\Contracts\IGetResponse;
use App\Exceptions\Services\Stats\GetResponseAPIException;

class GetResponse implements IGetResponse
{
    protected $guzzle;

    private $api_key;

    private $api_url;

    /**
     * Set api key and optionally API endpoint
     * @param      $api_key
     * @param null $api_url
     */
    public function __construct($guzzle, $api_key, $api_url)
    {
        $this->guzzle = $guzzle;
        $this->api_key = $api_key;
        $this->api_url = $api_url;
    }

    /**
     * get single campaign
     * @param string $campaign_id retrieved using API
     * @return mixed
     */
    public function getCampaign($campaign_id)
    {
        return $this->call('campaigns/' . $campaign_id);
    }

    public function getCampaignStatisticsListsize($campaign_id, Carbon $fromDate, $groupBy = 'day')
    {
        return $this->call('campaigns/statistics/list-size?query[groupBy]=' . $groupBy 
            . '&query[createdOn][from]=' . $fromDate->toDateString() 
            . '&query[campaignId]=' . $campaign_id);
    }

    public function getAutorespondersStatistics(Carbon $fromDate, $groupBy = 'total')
    {
        $latestAutoresponders = $this->call('autoresponders?sort[createdOn]=desc');

        $latestAutorespondersIds = array_map(function($e) {
            return $e->autoresponderId;
        }, $latestAutoresponders);

        return $this->call('autoresponders/statistics?query[groupBy]=' . $groupBy
            . '&query[createdOn][from]=' . $fromDate->toDateString()
            . '&query[autoresponderId]=' . implode(',', $latestAutorespondersIds));
    }

    /**
     * add single contact into your campaign
     *
     * @param $params
     * @return mixed
     */
    public function addContact($params)
    {
        $params = $this->getParams($params);
        return $this->call('contacts', 'POST', $params);
    }

    protected function getParams($data)
    {
        return array(
			'name'              => $data['name'],
			'email'             => $data['email'],
			'dayOfCycle'        => 0,
			'campaign'          => array('campaignId' => $data['campaignToken']),
			'customFieldValues' => array(
			    array(
			        'customFieldId' => 'VvNs',
			        'value' => array($data['phone']),
			    ),
			),
        );
    }

    /**
     * Run request
     *
     * @param null $api_method
     * @param string $http_method
     * @param array $params
     * @return mixed
     */
    private function call($api_method, $http_method = 'GET', $params = array())
    {
        $url = $this->api_url . '/' . $api_method;

        try {
            $response = $this->guzzle->request(
                $http_method, 
                $url,
                [
                    'headers' => [
                        'X-Auth-Token' => 'api-key ' . $this->api_key,
                    ],
                    'form_params' => $params,
                ]
            );
        return json_decode($response->getBody()->getContents());

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $response = json_decode((string) $e->getResponse()->getBody());

            if ($response->code === 1008) {
                return;
            }

            throw new GetResponseAPIException($response);
        }
    }
}