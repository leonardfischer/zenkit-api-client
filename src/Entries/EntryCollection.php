<?php

namespace idoit\zenkit\Entries;

use JsonMapper;

/**
 * Class EntryCollection
 * @package idoit\zenkit\Entries
 */
class EntryCollection implements \JsonSerializable
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
     * @param array $entries
     * @throws \JsonMapper_Exception
     */
    public function setListEntries(array $entries)
    {
        $this->entries = (new JsonMapper())->mapArray($entries, [], EntryItem::class);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_filter(get_object_vars($this));
    }
}
