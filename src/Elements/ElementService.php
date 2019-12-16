<?php

namespace idoit\zenkit\Elements;

use GuzzleHttp\Exception\GuzzleException;
use idoit\zenkit\API;
use idoit\zenkit\BadResponseException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ElementService
 * @package idoit\zenkit\Elements
 */
class ElementService extends API
{
    /**
     * @param int $listId
     * @param array $parameters
     * @return ResponseInterface
     * @throws GuzzleException
     * @throws BadResponseException
     * @todo Use JsonMapper to map responses.
     */
    public function addElementToList(int $listId, array $parameters): ResponseInterface
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
        return $this->request("lists/{$listId}/elements", 'post', $parameters);
    }

    /**
     * @param $listAllId
     * @return ElementItem[]
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     * @throws BadResponseException
     */
    public function getElementsInList($listAllId): array
    {
        $response = $this->request("lists/{$listAllId}/elements");

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        return $this->mapper->mapArray($rawData, [], ElementItem::class);
    }

    /**
     * @param $listAllId
     * @param $elementAllId
     * @param array $parameters
     * @return ResponseInterface
     * @throws GuzzleException
     * @throws BadResponseException
     * @todo Use JsonMapper to map responses.
     */
    public function reorderKanban($listAllId, $elementAllId, array $parameters): ResponseInterface
    {
        /**
         * Example for parameters:
         * [
         *    "beforeAnchorId": [1, 2, 3],
         *    "toSortId": [3, 2, 1]
         * ]
         */
        return $this->request("lists/{$listAllId}/elements/{$elementAllId}/kanbanSort", 'put', $parameters);
    }

    /**
     * @param int $listId
     * @param int $elementId
     * @param array $parameters
     * @return ResponseInterface
     * @throws GuzzleException
     * @throws BadResponseException
     * @todo Use JsonMapper to map responses.
     */
    public function updateElementInList(int $listId, int $elementId, array $parameters): ResponseInterface
    {
        /**
         * Example for parameters:
         * [
         *    "name": "Label",
         *    "elementData": [...]
         * ]
         */
        return $this->request("lists/{$listId}/elements/{$elementId}", 'put', $parameters);
    }
}
