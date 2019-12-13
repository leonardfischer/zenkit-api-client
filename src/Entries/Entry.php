<?php

namespace idoit\zenkit\Entries;

/**
 * Class Entry
 * @package idoit\zenkit\Entries
 */
class Entry implements \JsonSerializable
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
    public $listId;

    /**
     * @var int
     */
    public $comment_count;

    /**
     * @var array
     */
    public $checklists;

    /**
     * @var string
     */
    public $created_by_displayname;

    /**
     * @var string
     */
    public $updated_by_displayname;

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_filter(get_object_vars($this));
    }
}
