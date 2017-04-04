<?php

namespace Resilient\Runner\Http\Facebook\Guzzle;

class AsyncHttpClient extends HttpClient
{

    public function send($url, $method, $body, array $headers, $timeOut)
    {
        $request = new GuzzleHttp\Psr7\Request($method, $url, $headers, $body);

        $promise = $this->client->sendAsync($request, ['timeout' => $timeOut])->then(function ($response) {
            return $this->psr7toGraphResponse($response);
        });
        $promise->wait();
    }
}