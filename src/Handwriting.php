<?php

namespace Nickcheek\Handwriting;

use GuzzleHttp\Client;

class Handwriting
{
    protected string $key;
    protected string $secret;
    protected Client $client;

    public function __construct($key, $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->client = new Client(['base_uri' => 'https://api.handwriting.io/']);
    }

    public function getHandwriting()
    {
        $response = $this->client->request('GET', 'handwriting');
    }
}
