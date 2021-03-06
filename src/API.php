<?php

namespace idoit\zenkit;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use idoit\zenkit\Elements\ElementService;
use idoit\zenkit\Entries\EntryService;
use idoit\zenkit\Lists\ListService;
use idoit\zenkit\Users\UserService;
use idoit\zenkit\Workspaces\WorkspaceService;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class API
 *
 * @package idoit\zenkit
 */
class API
{
    /**
     * Base API URL for zenkit.
     */
    public const URL = 'https://zenkit.com/api/v1/';

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * API constructor.
     * You can pass optional parameters to the Guzzle HTTP Client, please refer to:
     * http://docs.guzzlephp.org/en/stable/request-options.html
     *
     * @param string     $apiKey
     * @param array|null $requestOptions
     */
    public function __construct(string $apiKey, ?array $requestOptions = null)
    {
        $options = array_replace_recursive(
            (array)$requestOptions,
            [
                'base_uri' => self::URL,
                'headers'  => [
                    'Accept'         => 'application/json',
                    'Content-Type'   => 'application/json',
                    'Zenkit-API-Key' => $apiKey
                ]
            ]
        );

        $this->client = new Client($options);
    }

    /**
     * Removes - and _ and makes the next letter uppercase.
     * Copied from `JsonMapper->getCamelCaseName()`.
     *
     * @param string $name Property name
     * @return string
     */
    public static function getCamelCaseName(string $name): string
    {
        return str_replace(' ', '', ucwords(str_replace(['_', '-'], ' ', $name)));
    }

    /**
     * Global 'request' method to the Zenkit API endpoint.
     *
     * @param string      $uri
     * @param string|null $method
     * @param array|null  $parameters
     * @return ResponseInterface
     * @throws BadResponseException
     * @throws GuzzleException
     */
    public function request(string $uri, ?string $method = null, ?array $parameters = null): ResponseInterface
    {
        $response = $this->client->request($method ?: 'get', $uri, (array)$parameters);
        $responseStatus = $response->getStatusCode();

        if ($responseStatus < 200 || $responseStatus >= 300) {
            $exception = new BadResponseException(
                'The request did not answer with a 2xx status code (' . $responseStatus . ').',
                $responseStatus
            );

            throw $exception->setResponse($response);
        }

        return $response;
    }

    /**
     * @param bool|null            $raw
     * @param LoggerInterface|null $logger
     * @return ElementService
     */
    public function getElementService(?bool $raw = null, ?LoggerInterface $logger = null): ElementService
    {
        return new ElementService($this, (bool)$raw, $logger);
    }

    /**
     * @param bool|null            $raw
     * @param LoggerInterface|null $logger
     * @return EntryService
     */
    public function getEntryService(?bool $raw = null, ?LoggerInterface $logger = null): EntryService
    {
        return new EntryService($this, (bool)$raw, $logger);
    }

    /**
     * @param bool|null            $raw
     * @param LoggerInterface|null $logger
     * @return ListService
     */
    public function getListService(?bool $raw = null, ?LoggerInterface $logger = null): ListService
    {
        return new ListService($this, (bool)$raw, $logger);
    }

    /**
     * @param bool|null            $raw
     * @param LoggerInterface|null $logger
     * @return UserService
     */
    public function getUserService(?bool $raw = null, ?LoggerInterface $logger = null): UserService
    {
        return new UserService($this, (bool)$raw, $logger);
    }

    /**
     * @param bool|null            $raw
     * @param LoggerInterface|null $logger
     * @return WorkspaceService
     */
    public function getWorkspaceService(?bool $raw = null, ?LoggerInterface $logger = null): WorkspaceService
    {
        return new WorkspaceService($this, (bool)$raw, $logger);
    }
}
