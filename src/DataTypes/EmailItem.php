<?php

namespace idoit\zenkit\DataTypes;

use idoit\zenkit\AbstractDataType;

/**
 * Class EmailItem
 * @package idoit\zenkit\DataTypes
 */
class EmailItem extends AbstractDataType
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $shortId;

    /**
     * @var string
     */
    public $uuid;

    /**
     * @var string
     */
    public $email;

    /**
     * @var bool
     */
    public $isPrimary;

    /**
     * @var \DateTime
     */
    public $created_at;

    /**
     * @var \DateTime
     */
    public $updated_at;

    /**
     * @var null|\DateTime
     */
    public $deprecated_at;

    /**
     * @var bool
     */
    public $isVerified;
}
