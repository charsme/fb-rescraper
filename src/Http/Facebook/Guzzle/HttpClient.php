<?php

namespace Resilient\Runner\Http\Facebook\Guzzle;

use Facebook\HttpClients\FacebookHttpClientInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Facebook\Http\GraphRawResponse;

class HttpClient implements FacebookHttpClientInterface
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function send($url, $method, $body, array $headers, $timeOut)
    {
        $request = new Request($method, $url, $headers, $body);
        $response = $this->client->send($request, ['timeout' => $timeOut]);

        return $this->psr7toGraphResponse($response);
    }

    protected function psr7toGraphResponse(ResponseInterface $response)
    {
        $responseHeaders = $response->getHeaders();
        foreach ($responseHeaders as $key => $values) {
            $responseHeaders[$key] = implode(', ', $values);
        }

        $responseBody = $response->getBody()->getContents();
        $httpStatusCode = $response->getStatusCode();

        return new GraphRawResponse(
                        $responseHeaders,
                        $responseBody,
                        $httpStatusCode);
    }
}