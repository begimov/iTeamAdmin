<?php

namespace App\Exceptions\Services\Stats;

use Exception;

class GetResponseAPIException extends Exception
{
    protected $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }
}