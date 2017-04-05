<?php

namespace Resilient\Runner\Http\Facebook\Guzzle;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class AsyncHttpClient extends HttpClient
{
    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    public function send($url, $method, $body, array $headers, $timeOut)
    {
        $request = new Request($method, $url, $headers, $body);

        $promise = $this->client->sendAsync($request, ['timeout' => $timeOut])->then(function ($response) {
            return $this->psr7toGraphResponse($response);
        });
        $promise->wait();
    }
}