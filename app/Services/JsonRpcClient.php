<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class JsonRpcClient
{
    const JSON_RPC_VERSION = '2.0';

    const METHOD_URI = 'api/data';

    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'AccessToken' => 'Hpd7YBtXPTX6bQV9pe5Rq4MfJQj4Lw86WdbF',
            ],
            'base_uri' => 'http://balance.local'
        ]);
    }

    public function send(string $method, array $params): array
    {
        $response = $this->client
            ->post(self::METHOD_URI, [
                RequestOptions::JSON => [
                    'jsonrpc' => self::JSON_RPC_VERSION,
                    'id' => time(),
                    'method' => $method,
                    'params' => $params
                ]
            ])->getBody()->getContents();

        return json_decode($response, true);
    }

}
