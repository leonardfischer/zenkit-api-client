<?php

namespace idoit\zenkit\Elements;

/**
 * Class ElementItem
 * @package idoit\zenkit\Elements
 */
class ElementItem implements \JsonSerializable
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
    public $description;

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
    public $isPrimary;

    /**
     * @var int int
     */
    public $sortOrder;

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

    /**
     * @var bool
     */
    public $visibleInPublicList;

    /**
     * @var bool
     */
    public $isAutoCreated;

    /**
     * @var bool
     */
    public $visible;

    /**
     * @var null|string
     */
    public $displayName;

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_filter(get_object_vars($this));
    }
}
