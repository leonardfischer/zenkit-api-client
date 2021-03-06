<?php

namespace idoit\zenkit\DataTypes;

use idoit\zenkit\AbstractDataType;
use idoit\zenkit\API;

/**
 * Class EntryItem
 *
 * @package idoit\zenkit\DataTypes
 */
class EntryItem extends AbstractDataType
{
    /**
     * Optional element configuration.
     *
     * @var ElementItem[]
     */
    private $elementConfiguration;

    /**
     * Array of elements with all their mapped values.
     *
     * @var array
     */
    public $elements = [];

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
     * @var int
     */
    public $listId;

    /**
     * @var \DateTime
     */
    public $created_at;

    /**
     * @var null|\DateTime
     */
    public $updated_at;

    /**
     * @var null|\DateTime
     */
    public $deprecated_at;

    /**
     * @var string
     */
    public $created_by_displayname;

    /**
     * @var string
     */
    public $updated_by_displayname;

    /**
     * @var null|string
     */
    public $deprecated_by_displayname;

    /**
     * @var int
     */
    public $created_by;

    /**
     * @var int
     */
    public $updated_by;

    /**
     * @var null|int
     */
    public $deprecated_by;

    /**
     * @var string
     */
    public $displayString;

    /**
     * @var string
     */
    public $sortOrder;

    /**
     * @var int
     */
    public $comment_count;

    /**
     * @var array
     */
    public $checklists;

    /**
     * EntryItem constructor.
     *
     * @param array|null $elementConfiguration
     */
    public function __construct(array $elementConfiguration = null)
    {
        if (is_array($elementConfiguration) && $elementConfiguration[0] instanceof ElementItem) {
            $this->elementConfiguration = $elementConfiguration;
        }
    }

    /**
     * Handle undefined properties during JsonMapper::map().
     *
     * @param object $object    Object that is being filled
     * @param string $propName  Name of the unknown JSON property
     * @param mixed  $jsonValue JSON value of the property
     * @return void
     */
    public function setUndefinedProperty($object, string $propName, $jsonValue)
    {
        if ($jsonValue === null) {
            return;
        }

        if (is_array($jsonValue) && count($jsonValue) === 0) {
            return;
        }

        foreach ($this->elementConfiguration as $element) {
            $camelCaseUuid = API::getCamelCaseName($element->uuid);

            if (strpos($propName, $camelCaseUuid) === 0) {
                if (!isset($object->elements[$element->uuid])) {
                    $object->elements[$element->uuid] = [];
                }

                // Get the correct key without the UUID and the uppercase first letter.
                $key = strtolower($propName[strlen($camelCaseUuid)]) . substr($propName, strlen($camelCaseUuid) + 1);

                $object->elements[$element->uuid][$key] = $jsonValue;

                return;
            }
        }
    }
}
