<?php

namespace idoit\zenkit\Entries;

use GuzzleHttp\Exception\GuzzleException;
use idoit\zenkit\AbstractService;
use idoit\zenkit\BadResponseException;
use idoit\zenkit\Elements\ElementItem;
use JsonMapper_Exception;

/**
 * Class EntryService
 * @package idoit\zenkit\Entries
 */
class EntryService extends AbstractService
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
        $response = $this->api->request("lists/{$listAllId}/entries/{$listEntryAllId}");

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
     * @return object|EntryCollection
     * @throws BadResponseException
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     */
    public function getEntriesForListView(string $listShortId, array $parameters = null)
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
        $response = $this->api->request("lists/{$listShortId}/entries/filter/list", 'post', $parameters);

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        return $this->mapper->map($rawData, new EntryCollection($this->elementConfiguration));
    }

    /**
     * @param string $listShortId
     * @param array $parameters
     * @return object|EntryItem[]
     * @throws BadResponseException
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     */
    public function getEntriesFromFilter(string $listShortId, array $parameters = null)
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
        $response = $this->api->request("lists/{$listShortId}/entries/filter", 'post', $parameters);

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        $result = [];
        $entryItem = new EntryItem($this->elementConfiguration);

        if ($this->elementConfiguration !== null) {
            $this->mapper->undefinedPropertyHandler = [$entryItem, 'setUndefinedProperty'];
        }

        foreach ($rawData as $entry) {
            // We don't use `mapArray` because we need EntryItem instances with the element configuration.
            $result[] = $this->mapper->map($entry, clone $entryItem);
        }

        return $result;
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
