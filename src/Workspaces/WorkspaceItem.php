<?php

namespace idoit\zenkit\Workspaces;

use idoit\zenkit\Lists\ListItem;
use JsonMapper;

class WorkspaceItem
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
     * @var bool
     */
    public $isDefault;

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
     * @var null|int
     */
    public $backgroundId;

    /**
     * @var int
     */
    public $created_by;

    /**
     * @var array
     */
    public $lists;

    /**
     * This method gets called by the JsonMapper in order to fill 'lists'.
     *
     * @param array $lists
     * @throws \JsonMapper_Exception
     */
    public function setLists(array $lists)
    {
        $this->lists = (new JsonMapper())->mapArray($lists, [], ListItem::class);
    }
}
