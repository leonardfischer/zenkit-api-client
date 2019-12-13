<?php

namespace idoit\zenkit\Lists;

use JsonMapper;

/**
 * Class Entry
 * @package idoit\zenkit\Entries
 */
class ListCollection implements \JsonSerializable
{
    /**
     * @var array
     */
    public $countData;

    /**
     * @var array
     */
    public $listEntries;

    /**
     * @param array $entries
     * @throws \JsonMapper_Exception
     */
    public function setListEntries(array $entries)
    {
        $this->listEntries = (new JsonMapper())->mapArray($entries, [], ListItem::class);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_filter(get_object_vars($this));
    }
}
