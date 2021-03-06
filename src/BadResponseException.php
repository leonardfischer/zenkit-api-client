<?php

namespace idoit\zenkit;

use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class BadResponseException
 *
 * @package idoit\zenkit
 */
class BadResponseException extends Exception
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @param ResponseInterface $response
     * @return $this
     */
    public function setResponse(ResponseInterface $response): BadResponseException
    {
        $this->response = $response;

        return $this;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
