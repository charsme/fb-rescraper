<?php

namespace Resilient\Runner\Http\Facebook;

use Facebook\HttpClients\FacebookStreamHttpClient;

class LongerStreamClient extends FacebookStreamHttpClient
{
    public function send($url, $method, $body, array $headers, $timeOut)
    {
        $timeOut *= 2;
        return parent::send($url, $method, $body, $headers, $timeOut);
    }
}
