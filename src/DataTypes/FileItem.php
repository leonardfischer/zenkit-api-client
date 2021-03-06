<?php

namespace idoit\zenkit\DataTypes;

use DateTime;
use idoit\zenkit\AbstractDataType;

/**
 * Class FileItem
 *
 * @package        idoit\zenkit\DataTypes
 * @psalm-suppress MissingConstructor
 */
class FileItem extends AbstractDataType
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
    public $fileName;

    /**
     * @var int
     */
    public $size;

    /**
     * @var string
     */
    public $mimetype;

    /**
     * @var bool
     */
    public $isImage;

    /**
     * @var string
     */
    public $s3key;

    /**
     * @var string
     */
    public $fileUrl;

    /**
     * @var object
     */
    public $cropParams;

    /**
     * @var string
     */
    public $width;

    /**
     * @var string
     */
    public $height;

    /**
     * @var DateTime
     */
    public $created_at;

    /**
     * @var DateTime
     */
    public $updated_at;

    /**
     * @var null|DateTime
     */
    public $deprecated_at;

    /**
     * @var int
     */
    public $uploaderId;

    /**
     * @var int
     */
    public $listId;

    /**
     * @var int
     */
    public $elementId;

    /**
     * @var object
     */
    public $cachedQuerys;

    /**
     * @var bool
     */
    public $in_use;
}
