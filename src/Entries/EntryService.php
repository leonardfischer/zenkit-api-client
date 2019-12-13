<?php

namespace synetics\zenkit\Entries;

use GuzzleHttp\Exception\GuzzleException;
use synetics\zenkit\API;
use Psr\Http\Message\ResponseInterface;

/**
 * Class EntryService
 * @package synetics\zenkit\Entries
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
    private function createEntry(): void
    {
    }

    /**
     * @todo
     */
    private function deprecateEntries(): void
    {
    }

    /**
     * @todo
     */
    private function deleteEntry(): void
    {
    }

    /**
     * @todo
     */
    private function updateChecklists(): void
    {
    }

    /**
     * @todo
     */
    private function searchEntriesGlobal(): void
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
    private function getEntriesFromFilter(): void
    {
    }

    /**
     * @todo
     */
    private function reorderEntry(): void
    {
    }

    /**
     * @todo
     */
    private function restoreEntry(): void
    {
    }

    /**
     * @todo
     */
    private function updateEntry(): void
    {
    }

    /**
     * @todo
     */
    private function updateEntryField(): void
    {
    }

    /**
     * @todo
     */
    private function synchronizeEntriesWithWatermark(): void
    {
    }
}
