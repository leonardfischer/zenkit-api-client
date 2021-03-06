<?php

namespace idoit\zenkit\DataTypes;

use idoit\zenkit\AbstractDataType;

/**
 * Class UserItem
 *
 * @package idoit\zenkit\DataTypes
 */
class UserItem extends AbstractDataType
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
    public $displayname;

    /**
     * @var string
     */
    public $fullname;

    /**
     * @var string
     */
    public $initials;

    /**
     * @var string
     */
    public $username;

    /**
     * @var null|int
     */
    public $backgroundId;

    /**
     * @var string
     */
    public $api_key;

    /**
     * @var null|string
     */
    public $imageLink;

    /**
     * @var bool
     */
    public $anonymous;

    /**
     * @var string
     */
    public $locale;

    /**
     * @var string
     */
    public $timezone;

    /**
     * @var bool
     */
    public $isSuperAdmin;

    /**
     * @var string
     */
    public $trello_token;

    /**
     * @var object
     */
    public $settings;

    /**
     * @var bool
     */
    public $isImagePreferred;

    /**
     * @var null|EmailItem[]
     */
    public $emails;
}
