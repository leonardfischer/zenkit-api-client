<?php

namespace idoit\zenkit\Entries;

use GuzzleHttp\Exception\GuzzleException;
use idoit\zenkit\API;
use idoit\zenkit\BadResponseException;
use JsonMapper;
use JsonMapper_Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class EntryService
 * @package idoit\zenkit\Entries
 */
class EntryService extends API
{
    /**
     * @param $listAllId
     * @param $listEntryAllId
     * @return Entry
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     * @throws BadResponseException
     */
    public function getEntry($listAllId, $listEntryAllId): Entry
    {
        $mapper = new JsonMapper();
        $response = $this->request("lists/{$listAllId}/entries/{$listEntryAllId}");

        return $mapper->map(json_decode($response->getBody()->getContents(), false), new Entry());
    }

    /**
     * @todo
     */
    private function createEntry()
    {
    }

    /**
     * @todo
     */
    private function deprecateEntries()
    {
    }

    /**
     * @todo
     */
    private function deleteEntry()
    {
    }

    /**
     * @todo
     */
    private function updateChecklists()
    {
    }

    /**
     * @todo
     */
    private function searchEntriesGlobal()
    {
    }

    /**
     * @param string $listShortId
     * @param array $parameters
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getEntriesForListView(string $listShortId, array $parameters): ResponseInterface
    {
        /**
         * Example for parameters:
         * [
         *    "filter": {},
         *    "groupByElementId": 0,
         *    "limit": 0,
         *    "skip": 0,
         *    "exclude": [],
         *    "allowDeprecated": false,
         *    "taskStyle": false
         * ]
         */
        return $this->request("lists/{$listShortId}/entries/filter/list", 'post', $parameters);
    }

    /**
     * @todo
     */
    private function getEntriesFromFilter()
    {
    }

    /**
     * @todo
     */
    private function reorderEntry()
    {
    }

    /**
     * @todo
     */
    private function restoreEntry()
    {
    }

    /**
     * @todo
     */
    private function updateEntry()
    {
    }

    /**
     * @todo
     */
    private function updateEntryField()
    {
    }

    /**
     * @todo
     */
    private function synchronizeEntriesWithWatermark()
    {
    }
}
