<?php

namespace synetics\zenkit;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class API
{
    /**
     * Base API URL for zenkit.
     */
    const URL = 'https://zenkit.com/api/v1/';

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * Client constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->client = new Client([
            'base_uri' => self::URL,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Zenkit-API-Key' => $apiKey
            ]
        ]);
    }

    /**
     * @param string $uri
     * @param string $method
     * @param array $parameters
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function request(string $uri, string $method = null, array $parameters = null): ResponseInterface
    {
        $response = $this->client->request($method ?: 'get', $uri, $parameters);

        if ($response->getStatusCode() !== 200) {
            // Do something :(
        }

        return $response;
    }
}
