<?php

namespace Nickcheek\Handwriting;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Writer extends Builder
{
    protected string $key;
    protected array $auth;
    protected string $secret;
    protected Client $client;

    public function __construct($key, $secret)
    {
        parent::__construct();
        $this->key = $key;
        $this->secret = $secret;
        $this->auth =  ['auth' => [$this->key, $this->secret]];
        $this->client = new Client(['base_uri' => 'https://api.handwriting.io/']);
    }

    public function getAllHandwriting(array $values=[]): array
    {
        $client = $this->client->request('GET', 'handwritings', $this->auth);
        return json_decode($client->getBody()->getContents());
    }

    public function getHandwriting(string $handwritingID): object
    {
        $client = $this->client->request('GET', 'handwritings/'.$handwritingID, $this->auth);
        return json_decode($client->getBody()->getContents());
    }

    public function renderPNGImage(string $build): string
    {
        $params = ['headers'=> ['Content-Type' => 'image/png']];
        $this->auth = array_merge($this->auth, $params);
        $client = $this->client->request('GET', '/render/png?'.$build, $this->auth);
        $png = 'data:image/png;base64,' . base64_encode($client->getBody()->getContents());
        return '<img src="'.$png.'">';
    }

    public function renderPNGString(string $build): string
    {
        $params = ['headers'=> ['Content-Type' => 'image/png']];
        $this->auth = array_merge($this->auth, $params);
        $client = $this->client->request('GET', '/render/png?'.$build, $this->auth);
        return 'data:image/png;base64,' . base64_encode($client->getBody()->getContents());
    }

    public function renderPDF(string $build, string $filePath=__DIR__.'/pdf/',string $fileName='test.pdf'): string
    {
        if (!file_exists($filePath)) { mkdir($filePath, 0777, true); }
        $params = ['headers'=> ['Content-Type' => 'application/pdf','Content-disposition'=>'inline; filename=myFile.pdf','Accept-Ranges' => 'bytes'],'sink'=> $filePath.$fileName ];
        $this->auth = array_merge($this->auth, $params);
        $this->client->request('GET', '/render/pdf?'.$build, $this->auth);
        return $filePath.$fileName;
    }
}
