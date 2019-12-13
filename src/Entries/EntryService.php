<?php

namespace idoit\zenkit\Entries;

use GuzzleHttp\Exception\GuzzleException;
use idoit\zenkit\API;
use Psr\Http\Message\ResponseInterface;

/**
 * Class EntryService
 * @package idoit\zenkit\Entries
 */
class EntryService extends API
{
    /**
     * @param int|string $listAllId
     * @param int|string $listEntryAllId
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getEntry($listAllId, $listEntryAllId): ResponseInterface
    {
        return $this->request("lists/{$listAllId}/entries/{$listEntryAllId}");
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
