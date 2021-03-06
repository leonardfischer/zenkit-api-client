<?php

namespace idoit\zenkit;

use JsonSerializable;
use ReflectionClass;
use ReflectionProperty;

/**
 * Class API
 *
 * @package idoit\zenkit
 */
abstract class AbstractDataType implements JsonSerializable
{
    /**
     * @return array
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
