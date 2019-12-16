<?php

namespace idoit\zenkit\Entries;

use GuzzleHttp\Exception\GuzzleException;
use idoit\zenkit\API;
use idoit\zenkit\BadResponseException;
use idoit\zenkit\Elements\ElementItem;
use idoit\zenkit\Lists\ListCollection;
use JsonMapper_Exception;

/**
 * Class EntryService
 * @package idoit\zenkit\Entries
 */
class EntryService extends API
{
    /**
     * @var null|ElementItem[]
     */
    private $elementConfiguration = null;

    /**
     * @param ElementItem[] $elementConfiguration
     * @return $this
     */
    public function setElementConfiguration(array $elementConfiguration): self
    {
        $this->elementConfiguration = $elementConfiguration;

        return $this;
    }

    /**
     * @return $this
     */
    public function resetElementConfiguration(): self
    {
        $this->elementConfiguration = null;

        return $this;
    }

    /**
     * @param $listAllId
     * @param $listEntryAllId
     * @return object|EntryItem
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     * @throws BadResponseException
     */
    public function getEntry($listAllId, $listEntryAllId)
    {
        $response = $this->request("lists/{$listAllId}/entries/{$listEntryAllId}");

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        $entryItem = new EntryItem($this->elementConfiguration);
        $this->mapper->undefinedPropertyHandler = null;

        if ($this->elementConfiguration !== null) {
            $this->mapper->undefinedPropertyHandler = [$entryItem, 'setUndefinedProperty'];
        }

        return $this->mapper->map($rawData, $entryItem);
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
     * @return object|ListCollection
     * @throws BadResponseException
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     */
    public function getEntriesForListView(string $listShortId, array $parameters)
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
        $response = $this->request("lists/{$listShortId}/entries/filter/list", 'post', $parameters);

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        return $this->mapper->map($rawData, new ListCollection());
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
