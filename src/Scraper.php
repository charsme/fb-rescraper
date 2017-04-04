<?php

namespace Resilient\Runner;

use Resilient\Runner\Scraper\Item;

use GuzzleHttp\Psr7\Uri;

class Scraper
{
    protected $items;
    protected $itemCouter = 0;
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function addItem(UriInterface $uri, array $params = [], string $method = 'POST')
    {
        $this->items['item-' . $this->itemCouter] = $this->createItem($uri, $params, $method);
        $this->itemCouter++;

        return $this;
    }

    protected function createItem(UriInterface $uri, array $params = [], string $method = 'GET')
    {
        return new Item($uri, $params, $method);
    }

    public function run()
    {

    }

    public function post($client, $accesstoken = null)
    {
        return $client->post($uri->getPath(), $this->params, $accesstoken)
    }
}