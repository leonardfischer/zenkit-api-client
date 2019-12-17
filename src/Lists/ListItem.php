<?php

namespace idoit\zenkit\Lists;

use ReflectionClass;
use ReflectionProperty;

/**
 * Class Entry
 * @package idoit\zenkit\Entries
 */
class ListItem implements \JsonSerializable
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
    public $itemName;

    /**
     * @var bool
     */
    public $isBuilding;

    /**
     * @var bool
     */
    public $isMigrating;

    /**
     * @var string
     */
    public $sortOrder;

    /**
     * @var null|string
     */
    public $formulaTSortOrder;

    /**
     * @var null|string
     */
    public $listFilePolicy;

    /**
     * @var string
     */
    public $originProvider;

    /**
     * @var array
     */
    public $originData;

    /**
     * @var int
     */
    public $defaultViewModus;

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
     * @var \DateTime
     */
    public $origin_created_at;

    /**
     * @var null|\DateTime
     */
    public $origin_updated_at;

    /**
     * @var null|\DateTime
     */
    public $origin_deprecated_at;

    /**
     * @var int
     */
    public $workspaceId;

    /**
     * @var null|int
     */
    public $backgroundId;

    /**
     * @var int
     */
    public $visibility;

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
