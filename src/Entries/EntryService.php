<?php

namespace idoit\zenkit\Entries;

use GuzzleHttp\Exception\GuzzleException;
use idoit\zenkit\AbstractService;
use idoit\zenkit\BadResponseException;
use idoit\zenkit\DataTypes\ElementItem;
use idoit\zenkit\DataTypes\EntryItem;
use JsonMapper_Exception;

/**
 * Class EntryService
 *
 * @package        idoit\zenkit\Entries
 * @psalm-suppress PropertyNotSetInConstructor
 */
class EntryService extends AbstractService
{
    /**
     * @var null|ElementItem[]
     */
    private $elementConfiguration;

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
     * @param int|string $listAllId
     * @param int|string $listEntryAllId
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

        /**
         * @psalm-suppress PossiblyNullPropertyAssignmentValue
         */
        $this->mapper->undefinedPropertyHandler = null;

        if ($this->elementConfiguration !== null) {
            $this->mapper->undefinedPropertyHandler = [$entryItem, 'setUndefinedProperty'];
        }

        return $this->mapper->map($rawData, $entryItem);
    }

    /**
     * @param string     $listShortId
     * @param array|null $parameters
     * @return object|EntryCollection
     * @throws BadResponseException
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     */
    public function getEntriesForListView(string $listShortId, ?array $parameters = null)
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

        // In case of passed parameters, we prepare the correct format for Guzzle.
        if (is_array($parameters) && count($parameters)) {
            $parameters = ['json' => $parameters];
        }

        $response = $this->api->request("lists/{$listShortId}/entries/filter/list", 'post', $parameters);

        $rawData = json_decode($response->getBody()->getContents(), false);

        if ($this->raw) {
            return $rawData;
        }

        return $this->mapper->map($rawData, new EntryCollection($this->elementConfiguration));
    }

    /**
     * @param string     $listShortId
     * @param array|null $parameters
     * @return object|EntryItem[]
     * @throws BadResponseException
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     */
    public function getEntriesFromFilter(string $listShortId, ?array $parameters = null)
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

        // In case of passed parameters, we prepare the correct format for Guzzle.
        if (is_array($parameters) && count($parameters)) {
            $parameters = ['json' => $parameters];
        }

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
     * @return void
     * @todo
     */
    private function createEntry(): void
    {
    }

    /**
     * @return void
     * @todo
     */
    private function deprecateEntries(): void
    {
    }

    /**
     * @return void
     * @todo
     */
    private function deleteEntry(): void
    {
    }

    /**
     * @return void
     * @todo
     */
    private function updateChecklists(): void
    {
    }

    /**
     * @return void
     * @todo
     */
    private function searchEntriesGlobal(): void
    {
    }

    /**
     * @return void
     * @todo
     */
    private function reorderEntry(): void
    {
    }

    /**
     * @return void
     * @todo
     */
    private function restoreEntry(): void
    {
    }

    /**
     * @return void
     * @todo
     */
    private function updateEntry(): void
    {
    }

    /**
     * @return void
     * @todo
     */
    private function updateEntryField(): void
    {
    }

    /**
     * @return void
     * @todo
     */
    private function synchronizeEntriesWithWatermark(): void
    {
    }
}
