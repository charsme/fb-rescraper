<?php

namespace Resilient\Runner\Scraper;

use Psr\Http\Message\UriInterface;

class Item
{
    protected $uri;
    protected $params;
    protected $identifier;

    public function __construct(UriInterface $uri, array $params = [])
    {
        $this->uri = $uri;
        $this->params = $this->filterParams($params);
        $this->method = strtoupper($method);
    }


    public function withParams(array $params)
    {
        $clone = clone $this;
        $clone->params = $this->filterParams($params);

        return $clone;
    }

    public function withIdentifier(string $identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function getParams()
    {
        return $this->params;
    }

}