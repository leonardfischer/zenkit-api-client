<?php

namespace idoit\zenkit\DataTypes;

use idoit\zenkit\AbstractDataType;

/**
 * Class FileItem
 * @package idoit\zenkit\DataTypes
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
     * @var string
     */
    public $created_at;

    /**
     * @var string
     */
    public $updated_at;

    /**
     * @var string
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
