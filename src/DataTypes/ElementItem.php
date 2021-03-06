<?php

namespace idoit\zenkit\DataTypes;

use idoit\zenkit\AbstractDataType;

/**
 * Class ElementItem
 *
 * @package idoit\zenkit\DataTypes
 */
class ElementItem extends AbstractDataType
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
    public $name;

    /**
     * @var null|string
     */
    public $displayName;

    /**
     * @var array
     */
    public $businessData;

    /**
     * @var array
     */
    public $elementData;

    /**
     * @var bool
     */
    public $blocked;

    /**
     * @var bool
     */
    public $isPrimary;

    /**
     * @var bool
     */
    public $isAutoCreated;

    /**
     * @var int int
     */
    public $sortOrder;

    /**
     * @var bool
     */
    public $visible;

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
     * @var int
     */
    public $elementcategory;

    /**
     * @var int
     */
    public $listId;
}
