<?php

namespace Nickcheek\Handwriting;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Writer extends Builder
{
    protected string $key;
    protected string $secret;
    protected Client $client;

    public function __construct($key, $secret)
    {
        parent::__construct();
        $this->key = $key;
        $this->secret = $secret;
        $this->client = new Client(['base_uri' => 'https://api.handwriting.io/']);
    }

    public function getAllHandwriting(): array
    {
        $client = $this->client->request('GET', 'handwritings',['auth' => [$this->key, $this->secret]]);
        return json_decode($client->getBody()->getContents());
    }

    public function getHandwriting(string $handwritingID): object
    {
        $client = $this->client->request('GET', 'handwritings/'.$handwritingID,['auth' => [$this->key, $this->secret]]);
        return json_decode($client->getBody()->getContents());
    }

    public function renderPNGImage($build): string
    {
        $client = $this->client->request('GET', '/render/png?'.$build,['auth' => [$this->key, $this->secret],'headers'=> ['Content-Type' => 'image/png']]);
        $png = 'data:image/png;base64,' . base64_encode($client->getBody()->getContents());
        return '<img src="'.$png.'">';
    }

    public function renderPNGString($build): string
    {
        $client = $this->client->request('GET', '/render/png?'.$build,['auth' => [$this->key, $this->secret],'headers'=> ['Content-Type' => 'image/png']]);
        return 'data:image/png;base64,' . base64_encode($client->getBody()->getContents());
    }
}
