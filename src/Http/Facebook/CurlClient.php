<?php

namespace Resilient\Runner\Http\Facebook;

use Facebook\HttpClients\FacebookCurlHttpClient;

class CurlClient extends FacebookCurlHttpClient
{
    public function openConnection($url, $method, $body, array $headers, $timeOut)
    {
        parent::openConnection($url, $method, $body, $headers, $timeOut);

        $options = [
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CONNECTTIMEOUT => 30,
        ];

        $this->facebookCurl->setoptArray($options);
    }
}
