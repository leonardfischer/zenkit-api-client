<?php

namespace idoit\zenkit;

use JsonSerializable;
use ReflectionClass;
use ReflectionException;
use ReflectionProperty;

/**
 * Class API
 * @package idoit\zenkit
 */
abstract class AbstractDataType implements JsonSerializable
{
    /**
     * @return array
     * @throws ReflectionException
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
