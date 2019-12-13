<?php

namespace synetics\zenkit\Elements;

use GuzzleHttp\Exception\GuzzleException;
use synetics\zenkit\API;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ElementService
 * @package synetics\zenkit\Elements
 */
class ElementService extends API
{
    /**
     * @param $listId
     * @param array $parameters
     * @return ResponseInterface
     * @throws GuzzleException
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
     * @param int|string $listAllId
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getElementsInList($listAllId): ResponseInterface
    {
        return $this->request("lists/{$listAllId}/elements");
    }

    /**
     * @param int|string $listAllId
     * @param int|string $elementAllId
     * @param array $parameters
     * @return ResponseInterface
     * @throws GuzzleException
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
