<?php

namespace idoit\zenkit;

use JsonMapper;
use Psr\Log\LoggerInterface;

/**
 * Class API
 *
 * @package idoit\zenkit
 */
abstract class AbstractService
{
    /**
     * @var API
     */
    protected $api;

    /**
     * @var JsonMapper
     */
    protected $mapper;

    /**
     * Should the client output raw data?
     *
     * @var bool
     */
    protected $raw = false;

    /**
     * AbstractService constructor.
     *
     * @param API                  $api
     * @param bool|null            $raw
     * @param LoggerInterface|null $logger
     */
    public function __construct(API $api, ?bool $raw = null, ?LoggerInterface $logger = null)
    {
        $this->api = $api;
        $this->mapper = new JsonMapper();
        $this->raw = (bool)$raw;

        if ($logger !== null) {
            $this->mapper->setLogger($logger);
        }
    }

    /**
     * @param bool $raw
     * @return $this
     */
    public function setRawOutput(bool $raw): self
    {
        $this->raw = $raw;

        return $this;
    }
}
