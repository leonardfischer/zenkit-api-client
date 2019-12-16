<?php

namespace idoit\zenkit;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use JsonMapper;
use Psr\Http\Message\ResponseInterface;

/**
 * Class API
 * @package idoit\zenkit
 */
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
     * @var JsonMapper
     */
    protected $mapper;

    /**
     * Should the client output raw data?
     * @var bool
     */
    protected $raw = false;

    /**
     * API constructor.
     * @param string $apiKey
     * @param \LoggerInterface|null $logger
     */
    public function __construct(string $apiKey, \LoggerInterface $logger = null)
    {
        $this->mapper = new JsonMapper();

        if ($logger !== null) {
            $this->mapper->setLogger($logger);
        }

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
     * Removes - and _ and makes the next letter uppercase.
     * Copied from `JsonMapper->getCamelCaseName()`.
     *
     * @param string $name Property name
     * @return string CamelCasedVariableName
     */
    public static function getCamelCaseName($name): string
    {
        return str_replace(' ', '', ucwords(str_replace(['_', '-'], ' ', $name)));
    }

    /**
     * Define if you'd like raw output (not mapped to objects).
     *
     * @param bool $rawOutput
     * @return $this
     */
    public function outputRawData(bool $rawOutput): self
    {
        $this->raw = $rawOutput;

        return $this;
    }

    /**
     * Global 'request' method to the Zenkit API endpoint.
     *
     * @param string $uri
     * @param string|null $method
     * @param array|null $parameters
     * @return ResponseInterface
     * @throws BadResponseException
     * @throws GuzzleException
     */
    public function request(string $uri, string $method = null, array $parameters = null): ResponseInterface
    {
        $response = $this->client->request($method ?: 'get', $uri, (array)$parameters);
        $responseStatus = $response->getStatusCode();

        if ($responseStatus < 200 || $responseStatus > 299) {
            throw new BadResponseException('The request did not answer with a 2xx status code.', $response->getStatusCode());
        }

        return $response;
    }
}
