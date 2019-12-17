<?php

namespace idoit\zenkit\Elements;

use GuzzleHttp\Exception\GuzzleException;
use idoit\zenkit\AbstractService;
use idoit\zenkit\BadResponseException;

/**
 * Class ElementService
 * @package idoit\zenkit\Elements
 */
class ElementService extends AbstractService
{
    /**
     * @param int $listId
     * @param array $parameters
     * @return ElementItem[]
     * @throws BadResponseException
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     */
    public function addElementToList(int $listId, array $parameters): array
    {
        /*
         * Example for parameters:
         * [
         *    "uuid": "0b26fa53-d45c-404b-8e3f-4eb3968774fb",
         *    "name": "Label",
         *    "elementData": {},
         *    "ElementCategory": 6
         * ]
         */
        $response = $this->api->request("lists/{$listId}/elements", 'post', $parameters);

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        return $this->mapper->mapArray($rawData, [], ElementItem::class);
    }

    /**
     * @param int|string $listAllId
     * @return ElementItem[]
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     * @throws BadResponseException
     */
    public function getElementsInList($listAllId): array
    {
        $response = $this->api->request("lists/{$listAllId}/elements");

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        return $this->mapper->mapArray($rawData, [], ElementItem::class);
    }

    /**
     * @param int|string $listAllId
     * @param int|string $elementAllId
     * @param array $parameters
     * @return ElementItem[]
     * @throws BadResponseException
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     */
    public function reorderKanban($listAllId, $elementAllId, array $parameters): array
    {
        /**
         * Example for parameters:
         * [
         *    "beforeAnchorId": [1, 2, 3],
         *    "toSortId": [3, 2, 1]
         * ]
         */
        $response = $this->api->request("lists/{$listAllId}/elements/{$elementAllId}/kanbanSort", 'put', $parameters);

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        return $this->mapper->mapArray($rawData, [], ElementItem::class);
    }

    /**
     * @param int $listId
     * @param int $elementId
     * @param array $parameters
     * @return ElementItem[]
     * @throws BadResponseException
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     */
    public function updateElementInList(int $listId, int $elementId, array $parameters): array
    {
        /**
         * Example for parameters:
         * [
         *    "name": "Label",
         *    "elementData": [...]
         * ]
         */
        $response = $this->api->request("lists/{$listId}/elements/{$elementId}", 'put', $parameters);

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        return $this->mapper->mapArray($rawData, [], ElementItem::class);
    }
}
