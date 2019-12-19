<?php

namespace idoit\zenkit\Entries;

use idoit\zenkit\AbstractDataType;
use idoit\zenkit\DataTypes\ElementItem;
use idoit\zenkit\DataTypes\EntryItem;
use JsonMapper;
use JsonMapper_Exception;

/**
 * Class EntryCollection
 * @package idoit\zenkit\Entries
 */
class EntryCollection extends AbstractDataType
{
    /**
     * @var array
     */
    public $countData;

    /**
     * @var array
     */
    public $entries;

    /**
     * @var ElementItem[]
     */
    private $elementConfiguration;

    /**
     * EntryCollection constructor.
     * @param ElementItem[] $elementConfiguration
     */
    public function __construct(array $elementConfiguration = null)
    {
        if (is_array($elementConfiguration)) {
            $this->elementConfiguration = $elementConfiguration;
        }
    }

    /**
     * This method gets called by the JsonMapper in order to fill 'listEntries'.
     *
     * @param array $entries
     * @throws JsonMapper_Exception
     */
    public function setListEntries(array $entries)
    {
        $mapper = new JsonMapper();
        $entryItem = new EntryItem($this->elementConfiguration);

        if ($this->elementConfiguration) {
            $mapper->undefinedPropertyHandler = [$entryItem, 'setUndefinedProperty'];
        }

        foreach ($entries as $entry) {
            // We don't use `mapArray` because we need EntryItem instances with the element configuration.
            $this->entries[] = $mapper->map($entry, clone $entryItem);
        }
    }
}
