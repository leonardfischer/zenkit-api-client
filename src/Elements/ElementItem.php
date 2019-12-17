<?php

namespace idoit\zenkit\Elements;

use ReflectionClass;
use ReflectionProperty;

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

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function jsonSerialize(): array
    {
        $result = [];
        $properties = (new ReflectionClass($this))->getProperties(ReflectionProperty::IS_PUBLIC);

        foreach ($properties as $property) {
            $result[$property->name] = $property->getValue($this);
        }

        return array_filter($result);
    }
}
