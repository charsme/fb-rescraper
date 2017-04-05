<?php

use Resilient\Runner\Scraper;
use Resilient\Runner\Scraper\Item;
use Resilient\Runner\Http\Facebook\Guzzle\AsyncHttpClient as FbClient;
use GuzzleHttp\Client;

include __DIR__ . '/../vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '{app_id}',
  'app_secret' => '{app_secret}',
  'default_graph_version' => 'v2.8',
  'http_client_handler' => new FbClient(new Client()),
  'persistent_data_handler' => 'memory'
]);

$accessToken = $fb->getApp()->getAccessToken();

$fb->setDefaultAccessToken($accessToken);

$result = $fb->post('/', ['id' => 'https://www.bola.net/inggris/guardiola-tak-tahu-kapan-jesus-kembali-c003f7.html', 'scrape' => true], $accessToken);

var_export($result);
